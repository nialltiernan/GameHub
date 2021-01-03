<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create([
            'username' => 'Nelly-T',
            'email' => 'nialltiernan93@gmail.com',
            'is_admin' => true
        ]);
        User::factory(1)->create([
            'username' => 'Johnson',
            'email' => 'jordane96@example.com',
        ]);
        User::factory(3)->create();
    }
}
