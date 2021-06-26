<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('categories')->delete();

        \DB::table('categories')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Computer',
                'type' => 'PC, Laptop',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Smart Phone',
                'type' => 'All smartphones',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Headphone',
                'type' => 'All headphones',
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            )
        ));


    }
}
