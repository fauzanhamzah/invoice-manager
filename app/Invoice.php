<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use AutoNumberTrait;

    protected $guarded = [];
    public function getTaxAttribute()
    {
        return ($this->total * 10) / 100;
    }

    public function getTotalPriceAttribute()
    {
        return ($this->total + (($this->total * 10) / 100));
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function detail()
    {
        return $this->hasMany(Invoice_detail::class);
    }

    public function getAutoNumberOptions()
    {
        return [
            'invoice_number' => [
                'format' => function () {
                    return 'INV/' . date('Ymd') . '/?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 4 // The number of digits in the autonumber
            ]
        ];
    }
}
