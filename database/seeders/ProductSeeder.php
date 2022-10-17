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
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/men-1.jpg',
            'price'            => 340,
            'clothing_type'    => '2',
            'product_category' => 'men', 
            'is_accessory'     => 'no',
            'discount'         => 0.12,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => "Men's Suit - Dark Red",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/suit-male2.jpg',
            'price'            => 560,
            'clothing_type'    => '1',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            'discount'         => 0,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => "Men's Suit - Black",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/suit-male3.jpg',
            'price'            => 530,
            'clothing_type'    => '1',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            'discount'         => 0.15,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'Hindi Costume',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/hindi-female.jpg',
            'price'            => 325,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0.10,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'Casual',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/women-01.jpg',
            'price'            => 200,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => 'Dress',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/women-02.jpg',
            'price'            => 235,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0.05,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => "Girls' Casual Costume",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/casualfemale-kids.jpg',
            'price'            => 195,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            'discount'         => 0.05,
            'create_user_id'   => 1,
            
        ]);
        
        $product = Product::create([
            'name'             => "Boys' Casual Costume",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/casualmale-kids.jpg',
            'price'            => 250,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            'discount'         => 0.08,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'Casual kids Costume',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/kid-03.jpg',
            'price'            => 175,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            'discount'         => 0.03,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'Male Summer Short - ADIDAS',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/male summer short - ADIDAS.jpeg',
            'price'            => 155,
            'clothing_type'    => '3',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => 'Female Yoga Wear',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/female yoga wear.jpg',
            'price'            => 190,
            'clothing_type'    => '3',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => 'Kids Yoga Wear',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/kids yoga wear.jpg',
            'price'            => 130,
            'clothing_type'    => '3',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => 'Bundle for Men (version 1)',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/men-accessory.jpg',
            'price'            => 75,
            'product_category' => 'men',
            'is_accessory'     => 'yes',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => 'Bundle for Women',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/women-accessory.jpg',
            'price'            => 85,
            'product_category' => 'women',
            'is_accessory'     => 'yes',
            'discount'         => 0.02,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'Bundle for Kids',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/kids_accessory.jpg',
            'price'            => 65,
            'product_category' => 'kids',
            'is_accessory'     => 'yes',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => "Women's Coat (version 2)",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/instagram-03.jpg',
            'price'            => 600,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0.50,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'winter costume for HIM',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/team-member-02.jpg',
            'price'            => 214,
            'clothing_type'    => '2',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            'discount'         => 0.20,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => 'winter costume for HER',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/team-member-01.jpg',
            'price'            => 199,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => 'winter costume for kids',
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/kid-01.jpg',
            'price'            => 173,
            'clothing_type'    => '2',
            'product_category' => 'kids',
            'is_accessory'     => 'no',
            'discount'         => 0.05,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => "Women's Coat (version 1)",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/instagram-01.jpg',
            'price'            => 420,
            'clothing_type'    => '2',
            'product_category' => 'women',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => "Men's Pullover",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/men-4.jpg',
            'price'            => 310,
            'clothing_type'    => '2',
            'product_category' => 'men',
            'is_accessory'     => 'no',
            'discount'         => 0,
  
            'create_user_id'   => 1,
        ]);

        $product = Product::create([
            'name'             => "Bundle for Men (version 2)",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/men-accessories.jpg',
            'price'            => 150,
            'product_category' => 'men',
            'is_accessory'     => 'yes',
            'discount'         => 0.30,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => "Women's Necklace",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/women-accessories.jpg',
            'price'            => 120,
            'product_category' => 'women',
            'is_accessory'     => 'yes',
            'discount'         => 0.15,
            'create_user_id'   => 1,
            
        ]);

        $product = Product::create([
            'name'             => "Kid's for girls",
            'description'      => 'xyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyzxyz',
            'image_name'       => 'assets/images/kids-accessories.jpg',
            'price'            => 60,
            'product_category' => 'kids',
            'is_accessory'     => 'yes',
            'discount'         => 0,
            'create_user_id'   => 1,
        ]);

    }
}
