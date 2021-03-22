<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    use AutoNumberTrait;

    protected $fillable = [
        'name',
        'addressline1',
        'addressline2',
        'town',
        'zipcode',
        'phone',
        'fax',
        'email'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'customer_number' => [
                'format' => function () {
                    return 'CS/' . date('Ymd') . '/?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 4 // The number of digits in the autonumber
            ]
        ];
    }
}
