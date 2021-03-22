<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use AutoNumberTrait;

    protected $fillable = [
        'name',
        'description',
        'price',
        'stock'
    ];

    public function getAutoNumberOptions()
    {
        return [
            'product_number' => [
                'format' => function () {
                    return 'PD/' . date('Ymd') . '/?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 4 // The number of digits in the autonumber
            ]
        ];
    }
}
