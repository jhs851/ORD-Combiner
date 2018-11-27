class Unit {
    constructor(data) {
        this.id = data.id;
        this.rate = data.rate;
        this.name = data.name;
        this.description = data.description;
        this.image = data.image;
        this.imageUrl = data.imageUrl;
        this.etc = data.etc;
        this.lowest = data.lowest;
        this.formulas = data.formulas || [];
        this.uppers = data.uppers || [];
        this.count = data.count || 0;
        this.buildScore = 0;
        this.etcBuildScore = 0;
        this.preCount = 0;
        this.preBuildWarn = 0;
        this.preBuildID = 0;
        this.percent = 0;
        this.output = data.name;
        this.show = true;
    }

    getNameWithRate() {
        return this.rate
            ? `${this.name}-${this.rate.name}`
            : this.name;
    }

    getNecessaries() {
        window.RECORDER = [];
        window.IS_RECORD = true;

        this.preventBuild(true, true);

        window.IS_RECORD = false;

        return this.calculateRecorderData();
    }

    getLowestNecessaries() {
        window.RECORDER = [];
        window.IS_RECORD = true;
        window.IS_RECORD_LOWEST = true;

        this.preventBuild(true, true);

        window.IS_RECORD = false;
        window.IS_RECORD_LOWEST = false;

        return this.calculateRecorderData();
    }

    calculateRecorderData() {
        let result = [];

        window.RECORDER.forEach(recorder => {
            let unitSet = result.find((a) => a[0] == recorder);

            if (unitSet) unitSet[1]++;
            else result.push([recorder, 1]);
        });

        return result;
    }

    calculateBuildScore() {
        if (! this.buildScore) {
            if (this.formulas && this.formulas.length) {
                this.formulas.forEach(formula => {
                    formula[0].calculateBuildScore();

                    this.buildScore += formula[0].buildScore * formula[1];

                    if (formula[0].etc) this.etcBuildScore += formula[0].buildScore * formula[1];
                    else this.etcBuildScore += formula[0].etcBuildScore * formula[1];
                });
            } else {
                this.buildScore = 1;

                if (this.etc) this.etcBuildScore = 1;
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

     setUppers(units) {
         let uppers = [];

         this.uppers.forEach(upper => uppers.push(Unit.get(upper.unit_id, units)));

         this.uppers = uppers;

         return this;
    }

    setCount(count) {
        if (! isNaN(count)) this.count = count < 0 ? 0 : count;
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
            let makeCount = 1;

            if (window.USE_ETC || ! this.etc) {
                for (let i = 0; i < 100; i++) {
                    if (this.preventBuild(false, true).score == this.buildScore) makeCount++;
                    else break;
                }
            }

            this.output = makeCount == 1 ? this.name : `(${makeCount}) ${this.name}`;

        } else if (this.percent > 0) this.output = `<span class="font-weight-bold">${this.percent}%</span> ${this.name}`;
        else this.output = this.name;
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
                window.LOCK_UNITS.forEach(unit => {
                    if (unit && this != unit) unit.preventBuild(false, true);
                });
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
                lowest: false
            };
        }

        if (! absMake && ! skipCount && this.preCount > 0) {
            this.preCount--;

            return {
                score: this.buildScore,
                lowest: false
            };
        } else {
            let result = {},
                addRecord = false;

            if (window.IS_RECORD && ! newBuild && this.lowest) addRecord = true;
            else if (this.formulas && this.formulas.length) {
                let buildScore = 0,
                    lowest = (! newBuild && this.lowest),
                    recorderSize = window.RECORDER.length;

                this.formulas.forEach(formula => {
                    for (let i = 0; i < formula[1]; i++) {
                        let build = formula[0].preventBuild(false, false, false, absMake);

                        buildScore += build.score;
                        lowest |= build.lowest;
                    }
                });

                if (window.IS_RECORD && ! newBuild && buildScore < this.buildScore && ! window.IS_RECORD_LOWEST) {
                    window.RECORDER = window.RECORDER.slice(0, recorderSize);
                    addRecord = true;
                } else {
                    result = {
                        score: buildScore,
                        lowest: lowest
                    };
                }
            } else {
                if (window.IS_RECORD && ! newBuild) {
                    addRecord = true;
                } else {
                    result = {
                        score: 0,
                        lowest: false
                    };
                }
            }

            if (addRecord) {
                window.RECORDER.push(this);

                result = {
                    score: 0,
                    lowest: false
                };
            }

            return result;
        }
    }

    canBuild() {
        if (this.build(true)) refreshAll();
    }

    build(newBuild) {
        if (newBuild && this.preventBuild(true, true).score != this.buildScore) {
            toastr.error(`재료가 부족해 <b>'${this.name}'</b>을(를) 만들 수 없습니다.`);

            return false;
        }

        if (! newBuild && this.count > 0) this.setCount(this.count - 1);
        else {
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
        for (let i = 0; i < units.length; i++) if (units[i].id == id)
            return units[i];
    }
}

export default Unit;
