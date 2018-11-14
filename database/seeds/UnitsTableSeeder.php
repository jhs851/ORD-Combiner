<?php

use App\Models\{Rate, Unit};
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
        foreach (config('units') as $rateName => $units) {
            if (! $rate = Rate::where('name', $rateName)->first()) {
                throw new Exception("rates 테이블에 '{$rateName}' 이름을 가진 칼럼이 존재하지 않습니다.");
            }

            $order = 0;

            collect($units)->filter(function($item, $unitName) use ($rate) {
                    return $this->has($rate, $unitName);
                })
                ->each(function($item, $unitName) use ($rate, &$order) {
                    $rate->units()->create([
                        'name'        => $unitName,
                        'description' => $item['description'],
                        'order'       => $order++,
                        'image'       => $item['image'],
                        'warn'        => $item['warn'] ?? false,
                        'etc'         => $item['etc'] ?? false,
                        'lowest'      => $item['lowest'] ?? false,
                        'count'       => $item['count'] ?? 0,
                    ]);
                });
        }

        $this->command->info('Seeded Units Table.');
    }

    /**
     * @param Rate   $rate
     * @param string  $unitName
     * @return bool
     */
    protected function has(Rate $rate, string $unitName) : bool
    {
        return ! Unit::where([
            ['rate_id', $rate->id],
            ['name', $unitName],
        ])->exists();
    }
}
