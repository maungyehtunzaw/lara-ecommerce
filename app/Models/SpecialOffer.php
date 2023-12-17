<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SpecialOffer extends Model
{
    use HasFactory;
    protected $table="e_specialoffers";
    public function offeritems() : HasMany{
        return $this->hasMany(SpecialOfferItem::class,'specialoffers_id','id');
    }
}
