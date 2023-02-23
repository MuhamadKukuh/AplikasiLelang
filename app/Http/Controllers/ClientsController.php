<?php

namespace App\Http\Controllers;

use App\Models\Aucation;
use App\Models\AucationHistory;
use App\Models\Item;
use App\Models\ItemCategory;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title']  = "Legit";
        $data['page_title'] = "Home";
        $data['aucations']  = Aucation::all();
        $data['categories'] = ItemCategory::all();
        return view('Clients.Index', $data);
    }

    public function AucationIndex(Request $request){
        $data['title'] = "Legit";
        $data['page_title'] = "Lelang";
        $data['categories'] = ItemCategory::all();
        $data['aucation_today'] = Aucation::where('aucation_date', date('Y-m-d'))->get();

        if($request->category && $request->orderBy ){
            $data['aucations'] = Aucation::join('items', function($item) use ($request){
                $item->on('items.item_id', '=', 'aucations.item_id')->where('items.category_id', $request->category);
            })->orderBy('aucation_id', $request->orderBy)->paginate(24)->withQueryString(); 
            // dd($kon->get());
        }elseif($request->orderBy){
            $data['aucations']  = Aucation::orderBy('aucation_id',$request->orderBy)->paginate(24)->withQueryString();
        }
        else{
            $data['aucations']  = Aucation::paginate(24)->withQueryString();
        }

        return view('Clients.Lelang.BarangLelang', $data);
    }

    public function aucationHistory(){
        $data['histories'] = AucationHistory::where('user_id', Auth()->user()->user_id)->orderBy('price_quotaion', "DESC")->get();
        $data['title']     = "Legit";
        $data['page_title']= "Riwayat Lelang";

        return view('Clients.Lelang.RiwayatLelang', $data);
    }

    public function AucationDate(){
        $data['title'] = "Legit";
        $data['aucations'] = Aucation::all();
        $data['page_title'] = "Jadwal Lelang";
        $data['aucation_dates'] = Aucation::select('aucation_date')->get();
        

        return view('Clients.Lelang.JadwalLelang', $data);
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

    public function bidItem(Request $request, Item $item){
        
    }

    public function show(Aucation $aucation)
    {
        $data['title']  = "Legit";
        $data['page_title'] = $aucation->aucation_name . " Detail";
        $data['aucation']  = $aucation;
        return view('Clients.DetailItem', $data);
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
