<?php

use App\{
    Column, Rate
};
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
        $columns = config('rates');

        foreach ($columns as $columnId => $rates) {
            collect($rates)
                ->filter(function($rate) {
                    return ! Rate::where('name', $rate)->exists();
                })
                ->each(function($rate) use ($columnId) {
                    Column::find($columnId)->rates()->create([
                        'name' => $rate
                    ]);
                });
        }

        $this->command->info('Seeded Rates Table.');
    }
}
