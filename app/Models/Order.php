<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'status_id', 'product_id','quantity'
    ];

    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id')->first()->name;
    }


    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->first();
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id')->first();
    }

}
