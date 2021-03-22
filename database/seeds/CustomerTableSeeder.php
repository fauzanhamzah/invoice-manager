<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'name' => 'PT. Sucofindo ( persero ) ',
            'addressline1' => 'Gedung Graha Kapital Lt.1 Suite 101 Jl. Kemang Raya No.4',
            'addressline2' => '',
            'town' => 'Jakarta Selatan',
            'zipcode' => '12780',
            'phone' => '+62 243243124',
            'fax' => '',
            'email' => '	sucofindo@mail.com'
        ]);
        Customer::create([
            'name' => 'PT.Indokusuma',
            'addressline1' => 'Gedung Graha Kapital Lt.1 Suite 101',
            'addressline2' => 'Jl. Kemang Raya No.4',
            'town' => 'Jakarta Selatan',
            'zipcode' => '12731',
            'phone' => '+62 217193425',
            'fax' => '+62 217190897',
            'email' => 'indokusuma@mail.com'
        ]);
    }
}
