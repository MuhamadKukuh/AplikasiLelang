<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Aucation;
use App\Models\AucationItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AucationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['aucations'] = Aucation::all();
        $data['title']     = "Lelang";
        $data['page_title']= 'List Lelang';

        return view('Admin.DataTables.DataLelang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['items'] = Item::all();
        $data['title'] = "Lelang";
        $data['page_title'] = "Tambah Lelang";

        return view('Admin.DataTables.TambahLelang', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function validateAucationReq($request){
        $cusMessage = [
            "initial_price.required" => "Harga dasar harus di isi",
            "multiple_bid.required"  => "Kelipatan bid harus di isi",
            "status.required"        => "Status lelang harus di isi",
            "item.required"       => "Barang lelang harus di pilih",
            "aucation_date.required"=> "Tanggal lelang harus di isi"
        ];

        $request->validate([
            "initial_price" => "required",
            "multiple_bid"  => "required",
            "status"        => "required",
            "item"          => "required",
            "aucation_date" => "required"
        ], $cusMessage);
    }

    public function store(Request $request)
    {
        $this->validateAucationReq($request);

        try {
            $AucationCreate = Aucation::create([
                "initial_price" => $request->initial_price,
                "multiple_bid"  => $request->multiple_bid,
                "aucation_date" => $request->aucation_date,
                "officer_id"    => Auth()->guard('officer')->user()->officer_id,
                "status"        => $request->status,
                "item_id"       => $request->item
            ]); 
            return redirect()->route('listLelang')->with('success', 'Berhasil menambahkan data lelang');
        } catch (\Throwable $th) {
            return redirect()->route('listLelang')->with('error', $th->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Aucation $aucation)
    {
        $data['item'] = Item::where('item_id', $aucation->item_id)->first();
        $data['aucation'] = $aucation;
        $data['title'] = "Lelang";
        $data['page_title'] = "Detail Lelang";

        return view('Admin.ShowData.itemPage', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Aucation $aucation)
    {
        $data['aucation'] = $aucation;
        $data['items']    = Item::all();
        $data['title']    = "Lelang";
        $data['page_title'] = "Edit Lelang";

        return view('Admin.DataTables.TambahLelang', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aucation $aucation)
    {
        // dd($aucation->with());
        $this->validateAucationReq($request);

        try {
            $aucation->update([
                'initial_price' => $request->initial_price,
                'multiple_bid'  => $request->multiple_bid,
                'aucation_date'  => $request->aucation_date,
                'status'        => $request->status,
                'item_id'       => $request->item
            ]);
    
            return redirect()->route('listLelang')->with('success', 'Data lelang berhasil di ubah');
        } catch (\Throwable $th) {
            return redirect()->route('listLelang')->with('success', $th->getMessage());
        }
        

    }

    public function deleteItem($data){
        
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

    public function updateStatus(Aucation $aucation){
        // dd("Hallo");
        if($aucation->status == "closed"){
            $aucation->update([
                'status' => "opened"
            ]);

            $message = "Berhasil membuka lelang";
        }else{
            $aucation->update([
                'status' => "closed"
            ]);
            $message = "Berhasil menutup lelang";
        }

        return back()->with('success', $message);
    }
}
