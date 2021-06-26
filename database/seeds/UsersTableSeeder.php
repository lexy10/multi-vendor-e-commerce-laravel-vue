<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 =>
            [
                'id' => 1,
                'full_name' => 'John Doe',
                'email' => 'john@examle.com',
                'password' => Hash::make('12345'),
                'address_id' => 1,
                'phone' => '01711001133',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ],
            1 =>
            [
                'id' => 2,
                'full_name' => 'Shakib Mostahid',
                'email' => 'b@gmail.com',
                'password' => Hash::make('12345'),
                'address_id' => 2,
                'phone' => '01922991100',
                'created_at' => '2019-02-11',
                'updated_at' => '2019-02-11',
            ],
        ]);


    }
}
