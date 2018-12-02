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
        foreach (config('characteristics') as $characteristic) {
            if (Characteristic::where('name', $characteristic['name'])->exists()) continue;

            Characteristic::create($characteristic);
        }

        $this->command->info('Seeded Characteristics Table.');
    }
}
