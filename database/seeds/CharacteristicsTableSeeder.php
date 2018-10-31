<?php

use App\Models\{Characteristic, Unit};
use Illuminate\Database\Seeder;

class CharacteristicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(config('characteristics'))
            ->filter(function($item) {
                return ! Characteristic::where('name', $item['name'])->exists();
            })
            ->each(function($item) {
                $characteristic = Characteristic::create([
                    'name' => $item['name'],
                    'color' => $item['color'],
                ]);

                $hasCharacteristicUnits = Unit::where('description', 'REGEXP', $item['regexp'])->pluck('id');

                $characteristic->units()->sync($hasCharacteristicUnits);
            });

        $this->command->info('Seeded Characteristics Table.');
    }
}
