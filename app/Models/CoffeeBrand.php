<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeBrand extends Model
{
    use HasFactory;

    protected $table = 'coffee_brands';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function CoffeeProducts() {
        return $this->hasMany(CoffeeProduct::class, 'id_coffee_brand', 'id');
    }
}
