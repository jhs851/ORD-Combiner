<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        $this->call(VersionsTableSeeder::class);

        $this->call(ColumnsTableSeeder::class);

        $this->call(RatesTableSeeder::class);

        $this->call(UnitsTableSeeder::class);

        $this->call(FormulasTableSeeder::class);

        $this->call(CharacteristicsTableSeeder::class);

        $this->call(UsersTableSeeder::class);
    }
}
