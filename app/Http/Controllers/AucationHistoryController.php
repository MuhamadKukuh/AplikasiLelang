<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AucationHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['title'] = 'Lelang';
        $data['page_title'] = 'Riwayat Lelang';
        if($request->has('search')){
            // dd($request->search);
            $data['users'] = User::where('name', 'LIKE', '%'.$request->search.'%')->orderBy('user_id', "DESC")->paginate(20)->withQueryString();
        }else{
            $data['users']  = User::orderBy('user_id', "DESC")->paginate(20);
        }
        // dd("DSAdsa");

        return view('Admin.RiwayatLelangUser', $data);
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $data['title'] = "Lelang";
        $data['page_title'] = "Riwayat lelang ". $user->name;
        $data['user']   = $user;

        return view('Admin.DetailRiwayat', $data);
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
