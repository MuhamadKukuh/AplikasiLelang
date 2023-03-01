<?php

namespace App\Http\Controllers;

use App\Models\Aucation;
use App\Models\AucationHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function setBid(Request $request, Aucation $aucation){

        // dd( $aucation->final_price - $request->bid % $aucation->multiple_bid == 0);
        // dd(($aucation->final_price xor $aucation->final_price == null) && ($aucation->final_price ? $aucation->final_price - $request->bid : $aucation->initial_price - $request->bid) % $aucation->multiple_bid == 0);
        // dd($aucation->final_price != null && ($aucation->final_price - $request->bid) % $aucation->multiple_bid == 0);
        if($request->bid >= $aucation->initial_price){
            if($request->bid <= $aucation->final_price){
                return back()->with('error', "Bid tidak boleh sama dengan nilai lelang saat ini");
            }
            if(($aucation->final_price xor $aucation->final_price == null) && ($aucation->final_price ? $aucation->final_price - $request->bid : $aucation->initial_price - $request->bid) % $aucation->multiple_bid == 0){
                try {
                    DB::transaction(function () use ($request, $aucation){
                        $aucation->update([
                            'user_id' => Auth()->user()->user_id,
                            'final_price' => $request->bid
                        ]);

                        AucationHistory::create([
                            'user_id' => Auth()->user()->user_id,
                            'aucation_id' => $aucation->aucation_id,
                            'price_quotaion' => $request->bid
                        ]);
                    });

                    return redirect()->route('lelangDetail', $aucation->aucation_id)->with('success', 'Berhasil melakukan BID');
                } catch (\Throwable $th) {
                    return redirect()->route('lelangDetail', $aucation->aucation_id)->with('error', 'Error'. $th->getMessage());
                }
            }elseif(($aucation->final_price - $request->bid) % $aucation->multiple_bid != 0 || ($aucation->final_price - $request->bid) % $aucation->multiple_bid != 0){
                return back()->with("error", "Bid harus sesuai dengan kelipatan bid");
            }
            return back()->with('error', "BID harus sesuai dengan harga awal atau lebih");
        }else{
            return back()->with('error', "BID tidak boleh kurang dari harga akhir");
        }
        
    }

    public function index()
    {
        //
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
