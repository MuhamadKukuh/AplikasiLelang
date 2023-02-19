<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AucationItems extends Model
{
    use HasFactory;

    protected $guarded = ['aucationitem_id'];

    public function items(){
        return $this->belongsTo(Item::class, 'item_id');
    }

    public function aucations(){
        return $this->belongsTo(Aucation::class, 'aucation_id');
    }
}
