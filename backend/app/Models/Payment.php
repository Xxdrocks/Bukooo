<?php

namespace App\Models;

use carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


class Payment extends Model
{
    protected $fillable = [
        'product_id',
        'user_id',
        'price',
        'gross_amount',
        'payment_method',
        'snap_token',
        'status',
        'paid_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

     public function getPaidAtFormattedAttribute()
    {
        return Carbon::parse($this->paid_at)->format('d M Y');
    }


}
