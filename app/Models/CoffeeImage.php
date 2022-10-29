<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CoffeeImage extends Model
{
    use HasFactory;

    protected $table = 'coffee_images';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function CoffeeProduct() {
        return $this->belongsTo(CoffeeProduct::class, 'id_product', 'id');
    }
}
