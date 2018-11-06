<?php

use App\Models\{Column, Rate};
use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        foreach (config('rates') as $columnId => $rates) {
            collect($rates)
                ->filter(function($rate) {
                    return ! Rate::where('name', $rate['name'])->exists();
                })
                ->each(function($rate) use ($columnId) {
                    Column::find($columnId)->rates()->create($rate);
                });
        }

        $this->command->info('Seeded Rates Table.');
    }
}
