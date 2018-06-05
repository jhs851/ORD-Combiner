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
        this.formulas = data.formulas || [];
        this.upperBuild = [];
        this.count = 0;
        this.buildScore = 0;
        this.etcBuildScore = 0;
        this.preCount = 0;
        this.preBuildWarn = 0;
        this.preBuildID = 0;
        this.percent = 0;
        this.output = data.name;
    }

    calculateBuildScore() {
        if (! this.buildScore) {
            if (this.formulas && this.formulas.length) {
                this.formulas.forEach(formula => {
                    formula[0].calculateBuildScore();

                    this.buildScore += formula[0].buildScore * formula[1];

                    if (formula[0].etc) {
                        this.etcBuildScore += formula[0].buildScore * formula[1];
                    } else {
                        this.etcBuildScore += formula[0].etcBuildScore * formula[1];
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

    setFormulas(units) {
        let formulas = [];

        this.formulas.forEach(formula => {
            formulas.push([
                Unit.get(formula.unit_id, units),
                formula.count
            ]);
        });

        this.formulas = formulas;

        return this;
    }

    setUpperBuild(units) {
        units.forEach(unit => {
            unit.formulas.forEach(formula => {
                if (this.id == formula.unit_id) {
                    this.upperBuild.push(unit);
                }
            });
        });

        return this;
    }

    setCount(count) {
        if (! isNaN(count)) {
            this.count = count < 0 ? 0 : count;
        }
    }

    refresh() {
        let preBuild = this.preventBuild(true, true),
            currentScore = preBuild.score,
            maxScore = this.buildScore;

        if (! window.USE_ETC) {
            currentScore -= this.etcBuildScore;
            maxScore -= this.etcBuildScore;
        }

        this.percent = Math.round(Math.min(currentScore / maxScore, 1) * 100);

        if (this.percent == 100) {
            // 만들 수 있는 갯수 계산
            let makeCount = 1;

            if (window.USE_ETC || ! this.etc) {
                for (let i = 0; i < 100; i++) {
                    if (this.preventBuild(false, true).score == this.buildScore) {
                        makeCount++;
                    } else {
                        break;
                    }
                }
            }

            // 이름 지정
            this.output = makeCount == 1 ? this.name : `(${makeCount}) ${this.name}`;

            // class 추가
            // this.html.addClass('success');
            // if (preBuild.warn) {
            //     this.html.addClass('warn');
            // } else {
            //     this.html.removeClass('warn');
            // }
        } else if (this.percent > 0) {
            this.output = `${this.percent}% ${this.name}`;
            // this.html.removeClass('warn');
            // this.html.removeClass('success');
        } else {
            // this.html.removeClass('warn');
            // this.html.removeClass('success');
        }

        // Lock Item
        if (window.LOCK_ITEMS.indexOf(this) != -1) {
            // count.addClass('lock');
        } else {
            // count.removeClass('lock');
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
    preventBuild(newBuild, skipCount, skipLocks, absMake) {
        if (newBuild) {
            window.PRE_BUILD_ID++;

            if (! skipLocks) {
                for (let i = 0; i < window.LOCK_ITEMS.length; i++) {
                    let lockUnit = window.LOCK_ITEMS[i];

                    if (lockUnit && this != lockUnit) {
                        lockUnit.preventBuild(false, true);
                    }
                }
            }
        }

        // 초기화
        if (this.preBuildID != window.PRE_BUILD_ID) {
            this.preBuildID = window.PRE_BUILD_ID;
            this.preCount = this.count;
        }

        if (! newBuild && ! window.USE_ETC && this.etc) {
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
            let result = {};

            if (this.formulas && this.formulas.length) {
                let buildScore = 0,
                    warn = (! newBuild && this.warn); // 자기 자신을 만드는데 warning은 필요없음

                this.formulas.forEach(formula => {
                    for (let i = 0; i < formula[1]; i++) {
                        let build = formula[0].preventBuild(false, false, false, absMake);

                        buildScore += build.score;
                        warn |= build.warn;
                    }
                });

                result = {
                    score: buildScore,
                    warn: warn
                };
            } else {
                result = {
                    score: 0,
                    warn: false
                };
            }

            return result;
        }
    }

    canBuild() {
        if (this.build(true)) {
            refreshAll();
        }
    }

    build(newBuild) {
        if (newBuild) {
            if (this.preventBuild(true, true).score != this.buildScore) {
                console.log(`Can not make '${this.name}'. Because not passed Prevent Build.`);

                return false;
            }
        }

        if (! newBuild && this.count > 0) {
            this.setCount(this.count - 1);
        } else {
            this.formulas.forEach(formula => {
                for (let i = 0; i < formula[1]; i++) {
                    formula[0].build();
                }
            });
        }

        if (newBuild) {
            this.setCount(this.count + 1);

            return true;
        }
    }

    static get(id, units) {
        for (let i = 0; i < units.length; i++) {
            if (units[i].id == id) {
                return units[i];
            }
        }
    }
}

export default Unit;
