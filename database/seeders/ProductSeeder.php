<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Product::factory(25)->create(); // it means create for me 25 record

        $product = Product::create([
            'name'             => "Dark Fresh Casual",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/men-1.jpg',
            'price'            => 340,
            'clothing_type'    => '2',
            'product_category' => 'men', 
            'is_accessory'     => 'no',
            'discount'         => 0.10,
            
        ]);

        $product = Product::create([
            'name'             => "Men's Suit - Dark Red",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/suit-male2.jpg',
            'price'            => 560,
            'clothing_type'    => '1',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            // 'discount' is not written so that means it has null value!
            
        ]);

        $product = Product::create([
            'name'             => "Men's Suit - Black",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/suit-male3.jpg',
            'price'            => 530,
            'clothing_type'    => '1',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            'discount'         => 0.15,
            
        ]);

        $product = Product::create([
            'name'             => 'Hindi Costume',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/hindi-female.jpg',
            'price'            => 325,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0,
            
        ]);

        $product = Product::create([
            'name'             => 'Casual',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/women-01.jpg',
            'price'            => 200,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0,
            
        ]);

        $product = Product::create([
            'name'             => 'Dress',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/women-02.jpg',
            'price'            => 235,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0.05,
            
        ]);

        $product = Product::create([
            'name'             => "Girls' Casual Costume",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/casualfemale-kids.jpg',
            'price'            => 195,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            // 'discount' is not written so that means it has null value!
            
        ]);
        
        $product = Product::create([
            'name'             => "Boys' Casual Costume",
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/casualmale-kids.jpg',
            'price'            => 250,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            'discount'         => 0.05,
            
        ]);

        $product = Product::create([
            'name'             => 'Casual kids Costume',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/kid-03.jpg',
            'price'            => 175,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            // 'discount' is not written so that means it has null value!
            
        ]);

        $product = Product::create([
            'name'             => 'Male Summer Short - ADIDAS',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/male summer short - ADIDAS.jpeg',
            'price'            => 155,
            'clothing_type'    => '3',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            // 'discount' is not written so that means it has null value!
            
        ]);

        $product = Product::create([
            'name'             => 'Female Yoga Wear',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/female yoga wear.jpg',
            'price'            => 190,
            'clothing_type'    => '3',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            // 'discount' is not written so that means it has null value!
            
        ]);

        $product = Product::create([
            'name'             => 'Kids Yoga Wear',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/kids yoga wear.jpg',
            'price'            => 130,
            'clothing_type'    => '3',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            // 'discount' is not written so that means it has null value!
            
        ]);

        $product = Product::create([
            'name'             => 'Bundle for Men',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/men-accessory.jpg',
            'price'            => 75,
            'product_category' => 'men',
            'is_accessory'     => 'yes',
            // 'discount' is not written so that means it has null value!
            
        ]);

        $product = Product::create([
            'name'             => 'Bundle for Women',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/women-accessory.jpg',
            'price'            => 85,
            'product_category' => 'women',
            'is_accessory'     => 'yes',
            'discount'         => 0.02,
            
        ]);

        $product = Product::create([
            'name'             => 'Bundle for Kids',
            'description'      => 'xxxxxxxxxxxxx',
            'image_name'       => 'assets/images/kids_accessory.jpg',
            'price'            => 65,
            'product_category' => 'kids',
            'is_accessory'     => 'yes',
            // 'discount' is not written so that means it has null value!
            
        ]);

    }
}
