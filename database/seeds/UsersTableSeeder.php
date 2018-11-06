<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            'name' => config('auth.admin.name')[0],
            'email' => config('auth.admin.email')[0],
            'email_verified_at' => now(),
            'password' => config('database.connections.mysql.password'),
            'tel' => '01024148641',
        ];

        if (! User::where('name', $admin['name'])->exists()) User::create($admin);

        $this->command->info('Seeded users table.');
    }
}
