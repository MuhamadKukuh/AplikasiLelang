<?php

namespace App\Http\Controllers;

use App\Models\ItemCategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Kategori";
        $data['page_title'] = "List Kategori";
        $data['categories'] = ItemCategory::all();

        return view('Admin.DataTables.DataKategori', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = "Kategori";
        $data['page_title'] = "Tambah Kategori";

        return view('Admin.DataTables.TambahKategori', $data);
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
            'category' => 'required|unique:item_categories'
        ], ['category.required' => "Kategori barang harus di isi", "category.unique" => "Jenis kategori sudah terdaftar"]);

        ItemCategory::create([
            "category" => $request->category
        ]);

        return redirect()->route('listKategori')->with("message", "Kategori berhasil ditambahkan");

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
    public function edit(ItemCategory $category)
    {
        $data['title'] = "Kategori";
        $data['page_title'] = "Tambah Kategori";
        $data['category']   = $category;

        return view('Admin.DataTables.TambahKategori', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemCategory $category)
    {
        if($request->category !== $category->category){
            $request->validate([
                'category'=> 'required|unique:item_categories'
            ]);

            $category->update([
                "category" => $request->category
            ]);
        }

        return redirect()->route('listKategori')->with('message', "Data kategori berhasil diubah");
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
