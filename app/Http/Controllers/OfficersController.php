<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Officer;
use App\Models\Aucation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class OfficersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

 

    public function index()
    {
        $data['page_title'] = "List Pegawai";
        $data['title'] = "Pegawai";
        $data['officers'] = Officer::where('level_id', 2)->get();

        return view('Admin.DataTables.DataPegawai', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Tambah Pegawai";
        $data['title'] = "Pegawai";
        return view('Admin.DataTables.TambahPegawai', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cusMessage = [
            "officer_name.required" => "Nama pegawai harus di isi",
            "username.required" => "Username harus di isi",
            "username.unique"   => "Username sudah digunakan",
            "password.required" => "Sandi harus di isi",
            "password.confirmed"=> "Sandi tidak sama dengan konfirmasi sandi"
        ];
        // dd($request->images);
        $request->validate([
            'officer_name' => 'required',
            'username' => 'required|unique:officers',
            'password'   => 'required|confirmed',
        ], $cusMessage);
        // dd($request->all());

        $sendData = Officer::create([
            "officer_name" => $request->officer_name,
            "username"     => $request->username,
            "password"     => Hash::make($request->password),
            "level_id"     => 2
        ]);

        return redirect()->route('listPegawai')->with('success', "Berhasil menambahkan data pegawai");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Officer $officer)
    {
        $data['officer'] = $officer;
        $data['title']   = "Petugas";
        $data['page_title'] = 'Profil Petugas';
        $data['officer_history'] = [
            "create_item" => Item::where('officer_id', $officer->officer_id)->get(),
            "create_aucation" => Aucation::where('officer_id', $officer->officer_id)->get()
        ];
        // dd($data['officer']);
        return view('Admin.Profile', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Officer $officer)
    {
        $data['title'] = "Petugas";
        $data['page_title'] = "Edit Petugas";
        $data['officer'] = $officer;

        return view('Admin.DataTables.TambahPegawai', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Officer $officer)
    {
        $cusMessage = [
            "officer_name.required" => "Nama pegawai harus di isi",
            "username.required" => "Username harus di isi",
            "username.unique"   => "Username sudah digunakan",
            "password.required" => "Sandi harus di isi",
            "password.confirmed"=> "Sandi tidak sama dengan konfirmasi sandi"
        ];
        // dd($request->images);
        $request->validate([
            'officer_name' => 'required',
            'password'   => 'required|confirmed'
        ], $cusMessage);
        // dd($request->all());
        if($request->username !== $officer->username){
            $request->validate([
                'username' => 'required|unique:officers'
            ]);
            dd("Hallo");
            $sendData = $officer->update([
                "officer_name" => $request->officer_name,
                "username"     => $request->username,
                "password"     => Hash::make($request->password),
                "level_id"     => 2
            ]);
        }
        $sendData = $officer->update([
            "officer_name" => $request->officer_name,
            "password"     => Hash::make($request->password),
            "level_id"     => 2
        ]);

        return redirect()->route('listPegawai')->with('success', "Berhasil mengubah data pegawai");
    }

    public function updatePassword(Request $request, Officer $officer){
        $cusMessage = [
            "password.required" => "Katasandi harus di isi",
            "password.confirmed"=> "Sandi tidak sama dengan konfirmasi sandi"
        ];
        $request->validate([
            "password" => 'required|confirmed'
        ], $cusMessage);

        $officer->update([
            "password" => Hash::make($request->password)
        ]);

        return back()->with('success', "Password petugas berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        $officer->delete();

        return back()->with('success', "Berhasil menghapus data");
    }

}
