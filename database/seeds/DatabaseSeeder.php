<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {
        $data = [
            [
                'name'          => 'admin',
                'email'         => 'admin@blexr.com',
                'password'      =>  bcrypt('admin'),
                'admin'         => '1',
            ]
        ];

        if (!\App\User::all()->count()) {
            foreach ($data as $user) {
                \App\User::create($user);
            }
        }
    }
}
