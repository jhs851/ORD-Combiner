<?php

use App\Models\{Rate, Unit, Version};
use Illuminate\Database\Seeder;

class FormulasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        $formulas = config('formulas');

        foreach (Version::all() as $version) {
            version($version);

            foreach ($formulas as $rate => $formula) {
                $rate = $this->getRate($rate);

                foreach ($formula as $unit => $recipes) {
                    $unit = $this->getUnit($rate, $unit);

                    foreach ($recipes as $recipe) {
                        $attributes = $this->getAttributes($rate, $unit, $recipe);

                        if (! $unit->formulas()->where($attributes)->exists())
                            $unit->formulas()->create($attributes);
                    }
                }
            }
        }

        $this->command->info('Seeded formulas and uppers table.');
    }

    /**
     * @param string    $rateName
     * @param Unit|null $combinationUnit
     * @return Rate
     * @throws Exception
     */
    protected function getRate(string $rateName, Unit $combinationUnit = null) : Rate
    {
        if (! $rate = Rate::where('name', $rateName)->first())
            throw new Exception(
                $combinationUnit ? "'{$combinationUnit->name}' 조합식의 " : '' . "'{$rateName}'은(는) 존재하지 않는 등급입니다."
            );

        return $rate;
    }

    /**
     * @param Rate      $rate
     * @param string    $unitName
     * @param Unit|null $combinationUnit
     * @return Unit
     * @throws Exception
     */
    protected function getUnit(Rate $rate, string $unitName, Unit $combinationUnit = null) : Unit
    {
        $unit = Unit::where([
            ['rate_id', $rate->id],
            ['name', $unitName],
        ])->first();

        if (! $unit)
            throw new Exception(
                $combinationUnit ? "'{$combinationUnit->name}' 조합식의 " : '' . "'{$unitName}_{$rate->name}'은(는) 존재하지 않는 유닛 입니다."
            );

        return $unit;
    }

    /**
     * @param Rate   $rate
     * @param Unit   $unit
     * @param string $recipe
     * @return array
     * @throws Exception
     */
    protected function getRecipe(Rate $rate, Unit $unit, string $recipe) : array
    {
        $recipe = preg_split('/(_|x)/', $recipe);

        if (count($recipe) !== 2 && count($recipe) !== 3)
            throw new Exception("{$rate->name} 등급의 {$unit->name} 조합에서 '" . implode('_', $recipe) . '\' 조합 형식을 확인해주세요.');

        return $recipe;
    }

    /**
     * @param Rate    $rate
     * @param Unit    $unit
     * @param string  $recipe
     * @return array
     * @throws Exception
     */
    protected function getAttributes(Rate $rate, Unit $unit, string $recipe) : array
    {
        $recipe = $this->getRecipe($rate, $unit, $recipe);
        $recipeRate = $this->getRate($recipe[1], $unit);
        $character = $this->getUnit($recipeRate, $recipe[0], $unit);

        return [
            'target_id'  => $unit->id,
            'unit_id'    => $character->id,
            'count'      => $recipe[2] ?? 1,
        ];
    }
}
