<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(25)->create();

        $user = User::create([ //ID = 1 (admin)
            'name'      => "Karim Tarek",
            'username'  => 'KarimDev',
            'phone'     => '01010110457',
            'bio'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus pariatur accusantium rerum rem alias consequuntur iusto harum maiores enim perferendis vitae inventore temporibus sint, doloremque iste natus commodi aut voluptas.',
            'email'     => 'admin@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789
            'gender'    => 'male',
            'dob'       => '1999-05-31', // date format -> year-month-day (YYYY-MM-DD)
            'user_type' => 'admin',
            'address'   => 'Cairo, xxxx st. 9, building 190',
            'whatsapp'  => '01010110457',
            'facebook'  => 'https://www.facebook.com/kareemtarekpk/',
            'instagram' => 'kareemtarekpk',
        ]);

        $user = User::create([ //ID = 2 (moderator)
            'name'      => "User_moderator",
            'username'  => 'ModeratorDev',
            'phone'     => '01140657921',
            'bio'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione, nam numquam consequuntur ullam dolorum velit laboriosam repellendus optio quis nihil dolores praesentium sed totam quisquam natus a vero explicabo iure?',
            'email'     => 'moderator@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789
            'gender'    => 'female',
            'dob'       => '1995-04-22', // date format -> year-month-day (YYYY-MM-DD)
            'user_type' => 'moderator',
            'address'   => 'Cairo, xxxx st. 2, building 148',
            'whatsapp'  => '01140657921',
            'facebook'  => 'https://www.facebook.com/moderator/',
            'instagram' => 'user_moderator',
        ]);

        $user = User::create([ //ID = 3 (customer)
            'name'      => "Maria Micheals",
            'username'  => 'Maria_EM',
            'phone'     => '01256113905',
            'bio'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt ad deleniti earum, tempore id laborum vero aliquam mollitia error eligendi dolores! Iusto impedit quo culpa, temporibus dolore animi? Quod, fuga.',
            'email'     => 'customer@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789
            'gender'    => 'female',
            'dob'       => '2001-01-25', // date format -> year-month-day (YYYY-MM-DD)
            'user_type' => 'customer',
            'address'   => 'Cairo, xxxx st. 15, building 29',
            'whatsapp'  => '01256113905',
            'facebook'  => 'https://www.facebook.com/maria/',
            'instagram' => 'maria_m1',
        ]);

        $user = User::create([ //ID = 4 (supplier)
            'name'      => "Raymond",
            'username'  => 'Raymond',
            'phone'     => '01000000111',
            'bio'       => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cupiditate, eligendi? Itaque impedit minima aperiam alias, quidem quo inventore dolores, ex aut laudantium velit voluptas. Maxime, vel dolores? Laboriosam, illo. Saepe?',
            'email'     => 'supplier@gmail.com',
            'password'  => '$2y$10$2Z8CF/lDpvDYYDIP28j7he3vHlKpFExarjbU04U7In8bjem9KlKdi', // password (is encrypted): 123456789 
            // 'gender'    => '', // null, because there is no specific gender for supplier (vendor/business) account.
            // 'dob'       => '', // null, because there is no DOB for supplier (vendor/business) account.
            'user_type' => 'supplier',
            'address'   => 'Cairo, xxxx st. 23',
            'whatsapp'  => '01000000111',
            'facebook'  => 'https://www.facebook.com/Raymond/',
            'instagram' => 'Raymond',
        ]);

    }
}
