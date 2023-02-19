<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    use HasFactory;

    protected $primaryKey = 'detail_id';
    protected $guarded    = ['detail_id'];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
