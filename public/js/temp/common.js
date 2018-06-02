let GROUPS = [];
let ITEMS = [];
let THUMB_ROOT = "/images/units/";

$(() => {
    LoadFromWrContent();
});

function LoadFromWrContent()
{
    let rates = $.parseJSON($("#wr_content_json").text());

    if (rates) {
        rates.forEach(rate => {
            Rate.add(rate);
        });

        rates.forEach(rate => {
            rate.units.forEach(unit => {
                let item = Unit.get(unit.id);

                unit.formulas.forEach(formula => {
                    item.formulas.push([
                        Unit.get(formula.unit_id),
                        formula.count,
                    ]);
                });
            });
        });
    }
}

