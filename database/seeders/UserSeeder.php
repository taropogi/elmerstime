<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'taropogi_123@yahoo.com',
                'is_admin' => '1',
                'password' => bcrypt('tarotaro'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}