<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function CoffeeProduct() {
        return $this->belongsTo(CoffeeProduct::class, 'id_product', 'id');
    }

    public function Order() {
        $this->belongsTo(Order::class, 'id_order', 'id');
    }
}
