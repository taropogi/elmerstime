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
                'username' => 'admin',
                'password' => bcrypt('tarotaro'),
                'name' => 'Admin',
                'first_name' => 'Admin',
                'last_name' => 'Admin',
                'email' => 'taropogi_123@yahoo.com',
                'is_admin' => '1',


                'email_verified_at' => date('Y-m-d H:i:s'),
            ],
            [
                'username' => 'taro',
                'password' => bcrypt('tarotaro'),
                'name' => 'Richard Bernisca',
                'first_name' => 'Richard',
                'last_name' => 'Bernisca',

                'email' => 'taro@taro.com',
                'is_admin' => '0',

                'email_verified_at' => date('Y-m-d H:i:s'),
                'g_first_name' => 'First',
                'g_middle_name' => 'Middle',
                'g_last_name' => 'Last',
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
