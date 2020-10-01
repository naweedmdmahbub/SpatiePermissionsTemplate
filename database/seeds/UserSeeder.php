<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $users = [
            [
                'username' => 'Admin',
                'fullname' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('111111'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'username' => 'firstuser',
                'fullname' => 'Full Name',
                'email' => 'fulluser@email.com',
                'password' => bcrypt('111111'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];
        User::insert($users);
    }
}
