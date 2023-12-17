<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory,SoftDeletes;
    protected $table='e_orders';

    public function customer() : HasOne
    {
        return $this->hasOne(Customer::class,"id","customers_id");
    }
    public function order_items() : HasMany{
        return $this->hasMany(OrderItem::class,"orders_id","id");
    }
    public function address() : HasOne{
        return $this->hasOne(Address::class,"id","deliveries_id");
    }
}
