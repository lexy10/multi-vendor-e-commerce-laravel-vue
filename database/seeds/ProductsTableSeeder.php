<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('products')->delete();

        \DB::table('products')->insert(array (
            0 =>
            array (
                'id' => 1,
            'name' => 'Apple MacBook Pro (2018)',
                'image_name' => '1.jpg',
                'description' => '<div class="ng-scope">
<p>Processor - Six Core Intel Core i7<br />Processor Clock Speed - 2.2-4.1GHz<br />Display Size - 15.4"<br />RAM - 16GB<br />RAM Type - DDR4 2400MHz (Onboard)<br />Storage - 256GB SSD</p>
</div>',
                'price' => 214200,
                'discount' => 205000,
                'tag' => 'New',
                'category_id' => 1,
                'vendor_id' => 1,
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            1 =>
            array (
                'id' => 3,
                'name' => 'HP Probook X360 440 G1',
                'image_name' => '2.jpg',
                'description' => '<div class="ng-scope">
<p>Generation - 8th Gen<br />Processor - Intel Core i7 8550U<br />Processor Clock Speed - 1.80-4.0GHz<br />Display Size - 14"<br />RAM - 8GB<br />RAM Type - DDR4<br />Storage - 512GB SSD<br />Operating System - Free Dos</p>
</div>',
                'price' => 94920,
                'discount' => 91000,
                'tag' => 'New',
                'category_id' => 1,
                'vendor_id' => 1,
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            2 =>
            array (
                'id' => 4,
                'name' => 'Apple iPad Pro',
                'image_name' => '3.jpg',
                'description' => '<div class="ng-scope">
<p>Model - Apple iPad Pro 11 Inch WiFi+Cellular<br />Processor Type - A12X Bionic chip<br />Internal Memory - 256GB<br />Display Type - Liquid Retina display<br />Display Size - 11"<br />Screen Resolution - 2388 x 1668<br />Connectivity - Wi-Fi, Bluetooth 5.0, USB, GPS</p>
</div>',
                'price' => 115500,
                'discount' => 111000,
                'tag' => 'Hot',
                'category_id' => 2,
                'vendor_id' => 2,
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            3 =>
            array (
                'id' => 5,
            'name' => 'Google Pixel 3 (64 GB)',
                'image_name' => '4.jpg',
                'description' => '<div class="ng-scope">
<ul class="i8Z77e">
<li class="TrT0Xe">Processor: Qualcomm Snapdragon 845 2.5 GHz quad-core.</li>
<li class="TrT0Xe">Display: 5.5 inch, 2160x1080-pixel</li>
<li class="TrT0Xe">Operating system: Android 9 Pie.</li>
<li class="TrT0Xe">RAM: 4GB LPDDR4.</li>
<li class="TrT0Xe">Storage: 64GB internal.</li>
<li class="TrT0Xe">Cameras: 12.2-megapixel rear f/1.8 dual-pixel</li>
</ul>
</div>',
                'price' => 71900,
                'discount' => 71000,
                'tag' => 'New',
                'category_id' => 2,
                'vendor_id' => 2,
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-09',
            ),
            4 =>
            array (
                'id' => 6,
                'name' => 'Samsung Galaxy Note 9',
                'image_name' => '5.jpg',
                'description' => '<div class="ng-scope">
<ul class="i8Z77e">
<li class="TrT0Xe">CPU: Qualcomm Snapdragon 845.</li>
<li class="TrT0Xe">Memory: 6/8GB.</li>
<li class="TrT0Xe">Storage: 128.</li>
<li class="TrT0Xe">MicroSD storage: Up to 512GB.</li>
<li class="TrT0Xe">Screen size: 6.4 inches.</li>
<li class="TrT0Xe">Resolution: 2960 x 1440.</li>
<li class="TrT0Xe">Connectivity: Bluetooth 5, NFC.</li>
<li class="TrT0Xe">Battery: 4,000mAh</li>
</ul>
</div>',
                'price' => 95000,
                'discount' => 94000,
                'tag' => 'Hot',
                'category_id' => 3,
                'vendor_id' => 1,
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-10',
            ),
            5 =>
            array (
                'id' => 8,
                'name' => 'A4tech Bloody G437',
                'image_name' => '6.jpg',
                'description' => '<ul class="i8Z77e">
<li>Driver Unit: 40 mm Neodymium Magnet</li>
<li>Frequency Response: 20-20000 Hz</li>
<li>Sensitivity: 100 dB</li>
<li>Impedance: 32 ohm</li>
</ul>',
                'price' => 3000,
                'discount' => 2290,
                'tag' => 'Hot',
                'category_id' => 3,
                'vendor_id' => 2,
                'created_at' => '2019-02-09',
                'updated_at' => '2019-02-12',
            ),
        ));


    }
}
