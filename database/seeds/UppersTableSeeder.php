<?php

use App\{
    Unit, Upper
};
use Illuminate\Database\Seeder;

class UppersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Unit::all() as $unit) {
            foreach ($unit->formulas as $formula) {
                $target = Unit::find($formula->unit_id);

                if (! $this->hasUpper($target, $unit)) {
                    $target->uppers()->create([
                        'unit_id' => $unit->id,
                    ]);
                }
            }
        }

        $this->command->info('Seeded Uppers Table.');
    }

    /**
     * @param Unit $target
     * @param Unit $unit
     * @return bool
     */
    protected function hasUpper(Unit $target, Unit $unit) : bool
    {
        return Upper::where([
            ['target_id', $target->id],
            ['unit_id', $unit->id],
        ])->exists();
    }
}
