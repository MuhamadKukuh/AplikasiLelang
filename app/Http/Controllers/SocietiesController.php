<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aucation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SocietiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "List Masyarakat";
        $data['title'] = "Masyarakat";
        $data['users'] = User::all();

        return view('Admin.DataTables.DataMasyarakat', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Tambah Masyarakat";
        $data['title'] = "Masyarakat";
        return view('Admin.DataTables.TambahMasyarakat', $data);
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
            "email.required" => "Email harus di isi",
            "email.email"    => "Email harus berisi email",
            "email.unique"   => "Email sudah digunakan",
            "password.required"       => "Password harus di isi",
            "password.confirmed" => "Password tidak sama dengan konfirmasi password",
            "name.required" => "Nama harus di isi",
            "phone_number.requried" => "Nomor HP harus di isi",
            "phone_number.max" => "Maksimal nomor HP 14 angka",
            "phone_number.min" => "Minimal nomor HP 12 angka",
            "phone_number.unique" => "Nomor HP sudah digunakan",
        ];

        $request->validate([
            'email' => "email|required|unique:users",
            'password' => "required|confirmed",
            'phone_number' => "required|unique:users|max:14|min:12",
            'name'  => "required"
        ], $cusMessage);

        User::create([
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "name"  => $request->name,
            "phone_number" => $request->phone_number
        ]);

        return redirect()->route('listMasyarakat')->with('success', "Berhasil menambahkan data masyarakat");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['title'] = "Masyarakat";
        $data['page_title'] = "Edit kata sandi masyarakat";
        $data['user'] = $user;

        return view('Admin.DataTables.TambahMasyarakat', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $cusMessage = [
            "password.required"       => "Kata sandi harus di isi",
            "password.confirmed" => "Kata sandi tidak sama dengan konfirmasi kata sandi",
        ];

        $request->validate([
            'password' => "required|confirmed",
        ], $cusMessage);
        // dd($request->all());
        $user->update([
            "password" => Hash::make($request->password)
        ]);

        return redirect()->route('listMasyarakat')->with('success', "Berhasil mengubah kata sandi masyarakat");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $cekAu = Aucation::where('user_id', $user->user_id)->get();
        if($cekAu->count() > 0){
            $cekAu->update([
                "user_id" => null
            ]);
        }
        $user->delete();

        return back()->with('success', "Berhasil menghapus data");
    }
}
