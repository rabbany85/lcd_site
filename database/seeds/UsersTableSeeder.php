<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Shumit';
        $user->last_name = 'Bhuyan';
        $user->address_line1 = '31 Waghorn Road';
        $user->postcode = 'E13 9JG';
        $user->user_type = 'Super Admin';
        $user->email = 'shomit011@gmail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('secret');
        $user->is_order_email = 1;
        $user->save(); 

        $user = new User;
        $user->name = 'Golam';
        $user->last_name = 'Rabbany';
        $user->address_line1 = '31 Waghorn Road';
        $user->postcode = 'E13 9JG';
        $user->user_type = 'Client';
        $user->email = 'rabbany85@gmail.com';
        $user->email_verified_at = now();
        $user->password = bcrypt('secret');
        $user->is_order_email = 1;
        $user->save(); 


        factory(User::class, 100)->create();
    
    }
}
