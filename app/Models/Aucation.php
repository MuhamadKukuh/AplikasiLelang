<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aucation extends Model
{
    use HasFactory;

    protected $primaryKey = 'aucation_id';
    protected $guarded = ['aucation_id'];

    public function officer(){
        return $this->belongsTo(Officer::class, 'officer_id');
    }

    public function histories(){
        return $this->hasMany(AucationHistory::class, 'aucation_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function item(){
        return $this->belongsTo(Item::class, 'item_id');
    }
}
