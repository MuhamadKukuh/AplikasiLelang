<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Aucation;
use App\Models\AucationHistory;
use App\Models\Officer;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "Dashboard";
        $data['title'] = "Dashboard";
        $data['latest_items'] = Item::whereDate('created_at', date('Y-m-d'))->orderBy('item_id', 'DESC')->limit(10)->get();
        if(Auth()->guard('officer')->user()->level_id == 1){
            $data['latest_aucations'] = Aucation::whereDate('aucation_date', date('Y-m-d'))->orWhere('status', 'opened')->orderBy('aucation_id', 'DESC')->limit(10)->get();
        }else{
            $data['latest_aucations'] = Aucation::whereDate('aucation_date', date('Y-m-d'))->orWhere('status', 'opened')->where('officer_id', Auth()->guard('officer')->user()->officer_id)->orderBy('aucation_id', 'DESC')->limit(10)->get();
        }
        $data['items_total'] = Item::get()->count(); 
        $data['aucationsHistory_total'] = AucationHistory::get()->count(); 
        $data['officers_total'] = Officer::where('level_id', 2)->get()->count(); 
        $data['users_total'] = User::get()->count(); 
        $data['latest_users'] = User::whereDate('created_at', date('Y-m-d'))->orderBy('user_id', 'DESC')->limit(9)->get();


        return view('Admin.Index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
