<?php

use App\Rate;
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
        $rates = collect(config('rates'));

        $rates->filter(function($rate) {
                return ! Rate::where('name', $rate)->exists();
            })
            ->each(function($rate) {
                Rate::create([
                    'name' => $rate
                ]);
            });

        $this->command->info('Seeded Rates Table.');
    }
}
