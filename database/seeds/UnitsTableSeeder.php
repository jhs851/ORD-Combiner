<?php

use App\Models\{Rate, Unit, Version};
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
        foreach (Version::all() as $version) {
            version($version);

            foreach (config('units') as $rateName => $units) {
                if (! $rate = Rate::where('name', $rateName)->first())
                    throw new Exception("rates 테이블에 '{$rateName}' 이름을 가진 칼럼이 존재하지 않습니다.");

                $order = 0;

                foreach ($units as $unitName => $item) {
                    if ($this->has($rate, $unitName)) continue;

                    $rate->units()->create([
                        'version_id'  => version()->id,
                        'name'        => $unitName,
                        'description' => $item['description'],
                        'order'       => $order++,
                        'image'       => $item['image'],
                        'etc'         => $item['etc'] ?? false,
                        'lowest'      => $item['lowest'] ?? false,
                        'count'       => $item['count'] ?? 0,
                    ]);
                }
            }
        }

        $this->command->info('Seeded Units Table.');
    }

    /**
     * @param Rate    $rate
     * @param string  $unitName
     * @return bool
     */
    protected function has(Rate $rate, string $unitName) : bool
    {
        return Unit::where([
            ['rate_id', $rate->id],
            ['name', $unitName],
        ])->exists();
    }
}
