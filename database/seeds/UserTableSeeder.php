<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Đặng Yến',
                'email' => 'dangthiyen103@gmail.com',
                'password' => Hash::make('12345678'),
                'level' => 1,
                'remember_token' => str_random(10),
            ],
            [
                'name' => 'Lê Trang',
                'email' => 'letrang@gmail.com',
                'password' => Hash::make('12345678'),
                'level' => 0,
                'remember_token' => str_random(10),
            ]
        ]);

        factory(App\User::class, 5)->create()->each(function($u) {
            $u->customer()->save(factory(App\Customer::class)->create(
                ['user_id' => $u->id]
            ));
        });
    }
}
