<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert($this->getData());
        \factory(User::class, 9)->create();

    }

    public function getData()
    {

        return [
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'email_verified_at' => now(),
            'password' => Hash::make(123), // password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
            'is_admin' => 1
        ];
    }
}
