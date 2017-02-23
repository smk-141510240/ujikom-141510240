<?php

use Illuminate\Database\Seeder;
use App\User;
class akunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create( [
            'name'  => 'Admin' ,
            'email' => 'Admin@gmail.com' ,
            'permission' => 'Admin',
            'password' => bcrypt('admin123'),
        ] );
    }
}
