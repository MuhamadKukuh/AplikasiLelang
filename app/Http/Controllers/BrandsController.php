<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Merek";
        $data['page_title'] = "List Merek";
        $data['brands'] = Brand::all();

        return view('Admin.DataTables.DataMerek', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Merek";
        $data['page_title'] = "Tambah Merek";

        return view('Admin.DataTables.TambahMerek', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required|unique:brands'
        ], ['brand_name.required' => "Merek barang harus di isi", "brand_name.unique" => "Jenis merek sudah terdaftar"]);

        Brand::create([
            "brand_name" => $request->brand_name
        ]);

        return redirect()->route('listMerek')->with("success", "brand berhasil ditambahkan");

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
    public function edit(Brand $brand)
    {
        $data['title'] = "Merek";
        $data['page_title'] = "Tambah Merek";
        $data['brand']   = $brand;

        return view('Admin.DataTables.TambahMerek', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        if($request->brand_name !== $brand->brand_name){
            $request->validate([
                'brand_name' => 'required|unique:brands'
            ], ['brand_name.required' => "Merek barang harus di isi", "brand_name.unique" => "Jenis merek sudah terdaftar"]);

            $brand->update([
                "brand_name" => $request->brand_name
            ]);
        }

        return redirect()->route('listMerek')->with('success', "Data merek berhasil diubah");
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
