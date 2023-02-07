<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemImage extends Model
{
    use HasFactory;

    protected $primaryKey = 'image_id';
    protected $guarded = ['image_id'];


    public function item(){
        return $this->belongsTo(Item::class, "item_id");
    }
}
