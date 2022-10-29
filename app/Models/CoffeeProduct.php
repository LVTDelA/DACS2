<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeProduct extends Model
{
    use HasFactory;

    protected $table = 'coffee_products';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function CoffeeBrand() {
        return $this->belongsTo(CoffeeBrand::class, 'id_coffee_brand', 'id');
    }

    public function CoffeeCategory() {
        return $this->belongsTo(CoffeeBrand::class, 'id_coffee_category', 'id');
    }

    public function CoffeeImages() {
        return $this->hasMany(CoffeeImage::class, 'id_product', 'id');
    }

    public function CoffeeDetails() {
        return $this->hasMany(CoffeeDetail::class, 'id_product', 'id');
    }
}