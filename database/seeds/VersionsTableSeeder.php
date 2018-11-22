<?php

use App\Models\Version;
use Illuminate\Database\Seeder;

class VersionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (config('versions') as $version) if (! Version::where('version', $version)->exists())
            Version::create(compact('version'));

        $this->command->info('Seeded versions table.');
    }
}
