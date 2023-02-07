<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';
    protected $guarded = ['item_id'];

    public function images(){
        return $this->hasMany(ItemImage::class, 'item_id');
    }

    public function officer(){
        return $this->belongsTo(Officer::class, 'officer_id');
    }

    public function category(){
        return $this->belongsTo(ItemCategory::class, 'category_id');
    }
}
