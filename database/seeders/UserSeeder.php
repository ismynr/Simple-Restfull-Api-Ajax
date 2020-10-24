<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
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
        $faker = Faker::class('id_ID');
        $email = $faker->email;

        App\User::create([
            'name' => $faker->name,
            'email' => $email,
            'password' => $email
        ]);
    }
}
