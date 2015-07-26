<?php



use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

         $this->call(UserTableSeeder::class);
        //$this->call(UserTableSeeder::class);

        Model::reguard();
    }
}

use App\User;
class UserTableSeeder extends Seeder
{

    public function run()
    {
        //DB::table('users')->delete();
        \App\User::create(array(
            'email'    => 'a1@yahoo.com',
            'password' => Hash::make('123'),
        ));
    }

}
