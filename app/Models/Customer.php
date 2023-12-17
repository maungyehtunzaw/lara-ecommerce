<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Customer extends Authenticatable
{
    use HasFactory,SoftDeletes,HasApiTokens,Notifiable;
    protected $table='e_customers';
    protected $guarded=[];
    protected $hidden=['password','remember_token'];

    public function orders() : HasMany
    {
        return $this->hasMany(Order::class,'customers_id','id');
    }
    public function addresses() : HasMany
    {
        return $this->hasMany(Address::class,'customers_id','id');
    }

}
