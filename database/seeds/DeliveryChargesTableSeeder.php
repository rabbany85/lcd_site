<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryChargesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        	      [
        	      	'title' => 'Charge 1',
        	      	'min_amount' => 0,
                    'max_amount' => 99.99,
                    'charge' => 5.50,
                    'created_at' => now(),
        	      ],
        	      [
                    'title' => 'Charge 2',
                    'min_amount' => 100,
                    'max_amount' => 149.99,
                    'charge' => 5.00,
                    'created_at' => now(),
                  ],
                  [
                    'title' => 'Charge 3',
                    'min_amount' => 150,
                    'max_amount' => 199.99,
                    'charge' => 4.50,
                    'created_at' => now(),
                  ]
        ];
        
        DB::table('delivery_charges')->insert($data);

    }
}
