class Rate {
    constructor(data) {
        this.html = '';
        this.id = data.id;
        this.name = data.name || '';
        this.units = data.units;

        this.fetch(data);
    }

    fetch(data) {
        if (data.units) {
            data.units.forEach(unit => {
                unit = new Unit(unit);
                ITEMS.push(unit);

                return unit;
            });
        }
    }

    static add(rate) {
        rate = new Rate(rate);
        GROUPS.push(rate);
    }
}
