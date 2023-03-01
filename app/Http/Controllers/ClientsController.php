<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Aucation;
use App\Models\ItemCategory;
use Illuminate\Http\Request;
use App\Models\AucationHistory;
use Illuminate\Support\Facades\Hash;

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
        $data['aucations']  = Aucation::where('aucation_date', date('Y-m-d'))->limit(6)->get();
        $data['categories'] = ItemCategory::all();
        return view('Clients.Index', $data);
    }

    public function ChangePassword(Request $request, User $user){
        $cusMes = [
            "password.required" => "Kata sandi harus di isi",
            "password.confirmed"=> "Kata sandi tidak sama dengan konfirmasi sandi"
        ];

        $request->validate([
            'password' => 'required|confirmed'
        ], $cusMes);

        try {
            $user->update([
                "password" => Hash::make($request->password)
            ]);
            return redirect()->route('profileClients')->with('success', 'Berhasil mengubah katasandi');
        } catch (\Throwable $th) {
            return back()->with('error', $th->getMessage());
        }

    }

    public function getEvents(){
        $Aucations = Aucation::all();
        $myEvent = [];
        foreach ($Aucations as $aucation) {
            $color = $aucation->status == 'closed' ? 'red' : 'green';
            $myEvent[] = [
                'title' => $aucation->item->item_name,
                'start' => $aucation->aucation_date,
                'id'    => $aucation->aucation_id,
                'backgroundColor' => $color,
                'borderColor' => $color
            ];
        }

        return response()->json($myEvent);
    }

    public function ClientsProfile(){
        $data['user'] = Auth()->user();
        $data['title']= "Lelang";
        $data['page_title'] = "Profile ". Auth()->user()->name;
        return view('Clients.Profile', $data);
    }

    public function AucationIndex(Request $request){
        $data['title'] = "Legit";
        $data['page_title'] = "Lelang";
        $data['categories'] = ItemCategory::all();
        $data['aucation_today'] = Aucation::where('aucation_date', date('Y-m-d'))->limit(3)->get();

        if($request->category){
            $data['aucations'] = Aucation::join('items', function($item) use ($request){
                $item->on('items.item_id', '=', 'aucations.item_id')->where('items.category_id', $request->category)->where('items.item_name', 'LIKE', '%'.$request->search.'%');
            })->where('status', $request->status)->orderBy('aucation_id', $request->orderBy)->paginate(24)->withQueryString(); 
            // dd($data['aucations']);
        }elseif($request->orderBy && $request->status){
            $data['aucations']  = Aucation::join('items', function($item) use ($request){
                $item->on('items.item_id', '=', 'aucations.item_id')->where('items.item_name', 'LIKE', '%'.$request->search.'%');
            })->where('status', $request->status)->orderBy('aucation_id',$request->orderBy)->paginate(24)->withQueryString();
        }elseif($request->search){
            $data['aucations'] = Aucation::join('items', function($item) use ($request){
                $item->on('items.item_id', '=', 'aucations.item_id')->where('items.item_name', 'LIKE', '%'.$request->search.'%');
            })->orderBy('aucation_id', 'DESC')->paginate(24)->withQueryString(); 
        }
        else{
            $data['aucations']  = Aucation::orderBy('aucation_id', 'DESC')->paginate(24)->withQueryString();
        }
        
        // if(isset(Auth()->user()->name)){
        //     // dd(Auth()->user()->user_id);
        //     $data['wins'] = AucationHistory::join('aucations', function($au) { 
        //         $au->on('aucations.aucation_id', '=' ,'aucation_histories.aucation_id')->where('aucations.status', 'closed')->where('aucations.user_id', Auth()->user()->user_id);
        //      })->where('aucation_histories.user_id', Auth()->user()->user_id)->limit(6)->get();

        //     //  dd($winAu);
        // }

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
        $data['aucations'] = Aucation::whereDate('aucation_date', date("Y-m-d"))->orderBy('aucation_id', 'DESC')->paginate(20);
        $data['page_title'] = "Jadwal Lelang";
        

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



    public function show(Aucation $aucation)
    {
        $data['title']  = "Legit";
        $data['page_title'] = $aucation->aucation_name . " Detail";
        $data['aucation']  = $aucation;
        $data['another_aucations'] = Aucation::where('aucation_id', '!=', $aucation->aucation_id)->orderBy('aucation_id', 'DESC')->limit(4)->get();
        $data['aucation_histories'] = AucationHistory::where('aucation_id', $aucation->aucation_id)->orderBy('created_at', 'DESC')->limit(3)->get();
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
