<?php

use Illuminate\Database\Seeder;

class OrderTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('orders')->delete();

        /*\DB::table('orders')->insert(array (
            0 =>
            array (
                'id' => 1,
                'user_id' => 1,
                'product_id' => '3:1:#000000:1',
                'order_status' => 'Delivered',
                'price' => 91000,
                'created_at' => '2019-02-02 07:32:33',
                'updated_at' => '2019-02-11',
            ),
            1 =>
            array (
                'id' => 2,
                'user_id' => 2,
                'product_id' => '5:1:#c0c0c0:1,30:2:#000000:2',
                'order_status' => 'Delivered',
                'price' => 93000,
                'created_at' => '2019-02-11 14:12:27',
                'updated_at' => '2019-02-11',
            ),
            2 =>
            array (
                'id' => 3,
                'user_id' => 1,
                'product_id' => '22:1:#000000:1',
                'order_status' => 'Delivered',
                'price' => 43999,
                'created_at' => '2019-02-07 16:29:16',
                'updated_at' => '2019-02-11',
            ),
            3 =>
            array (
                'id' => 4,
                'user_id' => 2,
                'product_id' => '18:2:#000000:1,38:1:#8080ff:2,30:1:#000000:3',
                'order_status' => 'On Process',
                'price' => 209998,
                'created_at' => '2019-02-06 12:05:30',
                'updated_at' => '2019-02-11',
            ),
            4 =>
            array (
                'id' => 5,
                'user_id' => 1,
                'product_id' => '12:1:#000000:2,17:1:#c0c0c0:3',
                'order_status' => 'On Process',
                'price' => 79500,
                'created_at' => '2019-02-11 16:56:54',
                'updated_at' => '2019-02-11',
            ),
            5 =>
            array (
                'id' => 6,
                'user_id' => 1,
                'product_id' => '5:1:#c0c0c0:1',
                'order_status' => 'Cancel',
                'price' => 71000,
                'created_at' => '2019-02-11 17:07:40',
                'updated_at' => '2019-02-11',
            )
        ));*/


    }
}
