<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class VendorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('vendors')->delete();

        \DB::table('vendors')->insert([
            0 =>
            [
                'id' => 1,
                'vendor_name' => 'Vendor 1',
                'store_name' => 'Vendor 1 Store',
                'store_location' => 'Lagos, Nigeria',
                'email' => 'vendor1@examle.com',
                'password' => Hash::make('12345'),
                'status' => 1,
                'address' => 'Lagos, Nigeria',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ],
            1 =>
            [
                'id' => 2,
                'vendor_name' => 'Vendor 2',
                'store_name' => 'Vendor 2 Store',
                'store_location' => 'Ogun, Nigeria',
                'email' => 'vendor2@examle.com',
                'password' => Hash::make('12345'),
                'status' => 0,
                'address' => 'Ogun, Nigeria',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ],
        ]);


    }
}
