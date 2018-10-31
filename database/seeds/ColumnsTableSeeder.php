<?php

use App\Models\Column;
use Illuminate\Database\Seeder;

class ColumnsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; Column::count() < 7; $i++) {
            Column::create();
        }

        $this->command->info('Seeded Columns Table.');
    }
}
