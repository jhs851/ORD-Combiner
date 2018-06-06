class Unit {
    constructor(data) {
        this.id = data.id;
        this.rate = data.rate;
        this.name = data.name;
        this.description = data.description;
        this.image = data.image;
        this.warn = data.warn;
        this.etc = data.etc;
        this.lowest = data.lowest;
        this.formulas = [];
        this.upperBuild = [];
        this.count = 0;
        this.buildScore = 0;
        this.etcBuildScore = 0;
        this.preCount = 0;
        this.preBuildWarn = 0;
        this.preBuildID = 0;
    }

    calculate() {
        if (! this.buildScore) {
            if (this.formulas && this.formulas.length) {
                this.formulas.forEach(formula => {
                    formula[0].calculateBuildScore();

                    this.buildScore += (formula[0].buildScore * formula[1]);

                    if (formula[0].etc) {
                        this.etcBuildScore += (formula[0].buildScore * formula[1]);
                    } else {
                        this.etcBuildScore += (formula[0].etcBuildScore * formula[1]);
                    }
                });
            } else {
                this.buildScore = 1;
                if (this.etc) {
                    this.etcBuildScore = 1;
                }
            }
        }

        return this.buildScore;
    }

    ToString() {
        return this.rate
            ? `${this.name}-${this.rate.name}`
            : this.name;
    }

    GetBuildScore() {
        return USE_ETC ? this.buildScore : this.buildScore-this.etcBuildScore;
    }

    SetCount(count) {
        if (! isNaN(count)) {
            this.count = count < 0 ? 0 : count;
        }
    }

    Refresh() {
        let name = this.html.find('.name'),
            count = this.html.find('.count'),
            progress = this.html.find('.progress');

        // change count
        count.val(this.count);

        // change percent
        let preBuild = this.PreBuild(true,true),
            currScore = preBuild.score,
            maxScore = this.buildScore;

        if (! USE_ETC) {
            currScore -= this.etcBuildScore;
            maxScore -= this.etcBuildScore;
        }

        let percent = Math.round(Math.min(currScore/maxScore, 1) * 100);

        progress.css('width', `${percent}%`);

        // change name
        if (percent == 100) {
            // 만들 수 있는 갯수 계산
            let makeCount = 1;
            if (USE_ETC || !this.etc) {
                for (let i = 0; i < 100; i++) {
                    if (this.PreBuild(false,true).score == this.buildScore)
                        makeCount ++;
                    else
                        break;
                }
            }

            // 이름 지정
            if (makeCount == 1)
                name.text(this.name);
            else
                name.text(`(${makeCount}) ${this.name}`);

            // class 추가
            this.html.addClass('success');

            if (preBuild.warn)
                this.html.addClass('warn');
            else
                this.html.removeClass('warn');
        } else if (percent > 0) {
            name.text(`${percent}% ${this.name}`);
            this.html.removeClass('warn');
            this.html.removeClass('success');
        } else {
            name.text(this.name);
            this.html.removeClass('warn');
            this.html.removeClass('success');
        }

        // lock Item
        if (LockItems.indexOf(this) != -1) {
            count.addClass('lock');
        } else {
            count.removeClass('lock');
        }
    }

    /**
     * 갯수의 변동(클릭,숫자입력 등으로 아이템의 갯수가 변경)이 있을때 호출되며
     * 모든 아이템의 제작 완료도 등을 다시 계산하게합니다.
     */
    static RefreshAll() {
        $.each($(ITEMS), (index, unit) => {
            unit.Refresh();
        });
    }

    Build(newBuild) {
        if (newBuild) {
            let result = this.PreBuild(true, true);

            if (result.score != this.buildScore) {
                console.log(`Can not make ${this.name}. because not passed Pre Build`);

                return false;
            }
        }

        RD.log(document.title, 'Build', this.name);

        if (! newBuild && this.count > 0) {
            this.SetCount(this.count - 1);
        } else {
            if (this.formulas && this.formulas.length) {
                for (let j = 0; j < this.formulas.length; j++) {
                    let formula = this.formulas[j];

                    for (let i = 0; i < formula[1]; i++) {
                        formula[0].build();
                    }
                }
            }
        }

        if (newBuild) {
            this.SetCount(this.count + 1);

            return true;
        }
    }

    /**
     * 빌드가 가능한지에 대해서 먼저 시험해봅니다.
     * 빌드가 가능할경우 buildScore를 리턴하며, 빌드가 불가능할경우 그 아래의 숫자를 리턴합니다.
     * 쉇자와 함께 경고를 리턴합니다.
     *
     * @param newBuild
     * @param skipCount 현재 제작할 수 있는 갯수가 충분하더라도 갯수를 감소시키지 않고 조합만 한다. 제작할때 자신의 갯수를 감소시키지 않기위해 사용
     * @param skipLocks 락을 제외한 체로 조합가능성을 따진다. (최상위 조합법을 판별하기위함)
     * @param absMake 갯수검사를 하지않고 조합만으로 제작여부를 판별한다 (최상위 조합법을 판별하기 위함)
     */
    PreBuild(newBuild, skipCount, skipLocks, absMake) {
        if (newBuild) {
            PRE_BUILD_ID++;

            if (! skipLocks) {
                let self = this;
                for (let i = 0; i < LockItems.length; i++) {
                    let litem = LockItems[i];
                    if (litem && self != litem) {
                        litem.PreBuild(false, true);
                    }
                }
            }
        }

        // 초기화
        if (this.preBuildID != PRE_BUILD_ID) {
            this.preBuildID = PRE_BUILD_ID;
            this.preCount = this.count;
        }

        if (! newBuild && ! USE_ETC && this.etc) {
            return {
                score: this.buildScore,
                warn: false
            };
        }

        if (! absMake && ! skipCount && this.preCount > 0) {
            this.preCount--;

            return {
                score: this.buildScore,
                warn: false
            };
        } else {
            let result = {},
                addRecord = false;

             if (this.formulas && this.formulas.length) {
                let buildScore = 0,
                    warn = (! newBuild && this.warn), // 자기 자신을 만드는데 warning은 필요없음
                    recorderSize = recorder.length;

                for(let j = 0; j < this.formulas.length; j++) {
                    let formula = this.formulas[j];

                    for (let i = 0; i < formula[1]; i++) {
                        let result = formula[0].PreBuild(false, false, false, absMake);

                        buildScore += result.score;
                        warn |= result.warn;
                    }
                }

                // 제작할 수 없는경우, 이 유닛이 경고유닛이라면 레코드한다. (단, 하위 조합의 레코드를 제거한다)
                if (isRecord && ! newBuild && buildScore < this.buildScore && (! isRecordLowest && this.warn)) {
                    recorder = recorder.slice(0,recorderSize);
                    addRecord = true;
                } else {
                    result = {
                        score: buildScore,
                        warn: warn
                    };
                }
            } else {
                // 재료도 부족한데 레시피도 없는대상이라면 당연히 기록해야죠
                // 최하위라는 증거
                if (isRecord && !newBuild) {
                    addRecord = true;
                } else {
                    result = {
                        score: 0,
                        warn: false
                    };
                }
            }

            if (addRecord) {
                recorder.push(this);

                result = {
                    score: 0,
                    warn: false
                };
            }

            return result;
        }
    }

    static get(id) {
        let result = null;

        $.each($(ITEMS), (index, unit) => {
            if (unit && unit.id == id) {
                result = unit;

                return false;
            }
        });

        return result;
    }
}
