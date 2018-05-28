<?php

use App\Rate;
use App\Unit;
use Illuminate\Database\Seeder;

class UnitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run() : void
    {
        $units = config('units');

        foreach ($units as $rating => $unit) {
            if (! $rate = Rate::where('name', $rating)->first()) {
                throw new Exception("rates 테이블에 '{$rating}' 이름을 가진 칼럼이 존재하지 않습니다.");
            }

            collect($unit)->filter(function($item) use ($rate) {
                    return $this->has($rate, $item);
                })
                ->each(function($item) use ($rate) {
                    $rate->units()->create(['name' => $item]);
                });
        }

        $this->command->info('Seeded Units Table.');
    }

    /**
     * @param Rate   $rate
     * @param string  $item
     * @return bool
     */
    protected function has(Rate $rate, string $item) : bool
    {
        return ! Unit::where([
            ['rate_id', $rate->id],
            ['name', $item],
        ])->exists();
    }
}
