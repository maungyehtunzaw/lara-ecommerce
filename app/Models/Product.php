<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='e_products';
    protected $guarded = ['id'];
    public function category() :HasOne
    {
       return $this->hasOne(Category::class,"id","categories_id");
    }
    public function images() : HasMany
    {
        return $this->hasMany(ProductImage::class,"products_id","id");
    }
}
