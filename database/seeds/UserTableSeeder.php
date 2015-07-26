<?php
use App\User;
class UserTableSeeder extends Seeder
{

    public function run()
    {
       // DB::table('users')->delete();
        User::create(array(
            'email'    => 'alish@yahoo.com',
            'password' => Hash::make('awesome'),
        ));
    }

}