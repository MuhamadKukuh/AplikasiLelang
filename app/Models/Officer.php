<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $primaryKey = 'officer_id';
    protected $guarded    = ['officer_id'];

    public function aucations(){

    }

    public function items(){
        return $this->hasMany(Item::class, 'officer_id');
    }

    public function level(){
        return $this->belongsTo(Level::class, 'level_id');
    }
}
