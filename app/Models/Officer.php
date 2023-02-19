<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    use HasFactory;

    protected $primaryKey = 'officer_id';
    protected $guarded    = ['officer_id'];

    public function aucations(){
        return $this->hasMany(Officer::class, 'officer_id');
    }

    public function items(){
        return $this->hasMany(Item::class, 'officer_id');
    }

    public function level(){
        return $this->belongsTo(Level::class, 'level_id');
    }
}
