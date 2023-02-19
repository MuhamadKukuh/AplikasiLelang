<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AucationHistory extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_id';
    protected $guarded = ['history_id'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function aucation(){
        return $this->belongsTo(Aucation::class, 'aucation_id');
    }
    

}
