<?php

use App\Customer;
use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new Customer();
        $customer->id   = 23;
        $customer->name = "customer 2";
        $customer->dob  = "2018-09-26";
        $customer->email  = "customer2@codegym.vn";
        $customer->city_id  = 6;
        $customer->address  = 'zxc';
        $customer->save();
    }
}
