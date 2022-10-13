<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Category::factory(25)->create();

        $category = Category::create([ //ID = 1
            'name'             => "Formal",
            'description'      => 'xxxxxxxxxxxx',
            'create_user_id'   => null,
        ]);

        $category = Category::create([ //ID = 2
            'name'             => "Casual",
            'description'      => 'xxxxxxxxxxxx',
            'create_user_id'   => null,
        ]);

        $category = Category::create([ //ID = 3
            'name'             => "Sports Wear",
            'description'      => 'xxxxxxxxxxxx',
            'create_user_id'   => null,
        ]);

    }
}
