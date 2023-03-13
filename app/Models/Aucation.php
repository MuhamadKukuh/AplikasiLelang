<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Laravel\Scout\Searchable;

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


    public function filterScope($search){
        if($search->has('condition')){
            $data = $this->join('items', function($item) use ($search){
                $wo = $item->on('items.item_id', '=', 'aucations.item_id')->join('item_details', function($detail) use ($search){
                    $detail->on('item_details.detail_id', '=', 'items.item_id')->where('item_details.condition', $search->condition);
                });
                if($search->category != null){
                    $wo->where('items.category_id', $search->category);
                }
                
            })->where('status', $search->status); 
            if($search->pmin != null && $search->pmax != null){
                // dd($data);
                return $data->where('initial_price', '<=', $search->pmax)->where('initial_price', '>=', $search->pmin)->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
            }elseif($search->pmin != null xor $search->pmax != null){
                $search->pmin != null ? $op = ">=" : $op = "<=";
                return $data->where('initial_price', $op, $search->pmin ? $search->pmin : $search->pmax)->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
            }
            // dd();

            return $data->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
            
        }else if($search->has('search')){
            return $this->join('items', function($item) use ($search){
                $item->on('items.item_id', '=', 'aucations.item_id')->where('items.item_name', 'LIKE', '%'. $search->search.'%');
            })->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
        }else if($search->has('status')){
            $data = $this->join('items', function($item) use ($search){
                $wo = $item->on('items.item_id', '=', 'aucations.item_id');
                if($search->category != null){
                    $wo->where('items.category_id', $search->category);
                }
            })->where('status', $search->status); 
            if($search->pmin != null && $search->pmax != null){
                // dd($data);
                return $data->where('initial_price', '<=', $search->pmax)->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
            }elseif($search->pmin != null xor $search->pmax != null){
                $search->pmin != null ? $op = ">=" : $op = "<=";
                return $data->where('initial_price', $op, $search->pmin ? $search->pmin : $search->pmax)->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
            }
            // dd();

            return $data->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
            
        }

        return $this->withCount('histories')->orderBy('histories_count', 'DESC')->paginate(24)->withQueryString();
    }
}
