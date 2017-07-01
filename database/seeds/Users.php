<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image  = 'avatars/default.png';
        $users = [
            [
                'name' => 'admin',
                'username' => 'admin',
                'email' => 'admin@boyeoffice.com',
                'password' => Hash::make('admin'),
                'status' => true,
                'is_admin' => true,
                'avatar'    => $image,
                'confirm_code' => str_random(64),
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now()
            ]
        ];
        DB::table('users')->insert($users);
    }
}
