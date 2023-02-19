<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = 'brand_id';
    protected $guarded    = ['brand_id'];

    public function detailItems(){
        return $this->hasMany(ItemDetail::class, 'brand_id');
    }
}
