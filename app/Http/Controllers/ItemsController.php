<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = "List Barang";
        $data['title'] = "Barang";
        $data['items'] = Item::all();

        return view('Admin.DataTables.DataBarang', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = "Tambah Barang";
        $data['title'] = "Barang";
        return view('Admin.DataTables.TambahBarang', $data);
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
            "item_name.required" => "Nama barang harus di isi",
            "initial_price.required" => "Harga awal harus di isi",
            "images.required" => "Gambar harus di isi",
            "images.*.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "images.*.max" => "Ukuran maksimal gambar 2MB",
        ];
        // dd($request->images);
        $request->validate([
            'item_name' => 'required',
            'initial_price' => 'required',
            'description'   => 'required',
            'images'  => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
        ], $cusMessage);

        
        DB::transaction(function() use($request){
            $storeItems = Item::create([
                "item_name" => $request->item_name,
                "initial_price" => $request->initial_price,
                "description" => $request->description,
                "category_id" => 1,
                "officer_id"  => 1,
                "item_main_image" => $request->file('images')[0]->store('itemImages')
            ]);

            foreach($request->file('images') as $image){
                if($image->getClientOriginalName() == $request->file('images')[0]->getClientOriginalName()){
                    continue;
                }

                ItemImage::create([
                    'image_name' => $image->getClientOriginalName(),
                    'image_size' => $image->getSize(),
                    'image_path' => $image->store('itemImages'),
                    'item_id'    => $storeItems->item_id
                ]);
            }
        });
        return redirect()->route('listBarang')->with('message', "Data berhasil ditambahkan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $data['page_title'] = "Detail Barang";
        $data['title'] = "Barang";
        $data['item'] = $item;

        return view('Admin.ShowData.ItemPage', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $data['page_title'] = "Edit Barang";
        $data['title'] = "Barang";
        $data['item'] = $item;
        return view('Admin.DataTables.TambahBarang', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // foreach($request->imagesDelete as $image){
            
        // }
        // dd($request->all());
        $cusMessage = [
            "item_name.required" => "Nama barang harus di isi",
            "initial_price.required" => "Harga awal harus di isi",
            "image.required" => "Gambar harus di isi",
            "images.*.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "images.*.max" => "Ukuran maksimal gambar 2MB",
            "image.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "image.max" => "Ukuran maksimal gambar 2MB",
        ];
        // dd($request->images);
        $request->validate([
            'item_name' => 'required',
            'initial_price' => 'required',
            'description'   => 'required',
        ], $cusMessage);

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048'
            ], $cusMessage);
            $item->item_main_image !== null ? Storage::delete($item->item_main_image) : '';
            $this->queryUpdateImages($request, $item);
            
        }else{
            Item::where('item_id', $item->item_id)->update([
                "item_name" => $request->item_name,
                "initial_price" => $request->initial_price,
                "description" => $request->description,
            ]);
        }
        if(isset($request->imagesDelete) && $request->file('images')){
            $request->validate([
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
            ], $cusMessage);

            $data = ItemImage::where('image_id', $request->imagesDelete)->get();
            foreach ($data as $value) {
                Storage::delete($value->image_path);
            }

            $this->queryDeleteImages($request->imagesDelete);
            foreach($request->file('images') as $image){
                ItemImage::create([
                    "image_name" => $image->getClientOriginalName(),
                    "image_size" => $image->getSize(),
                    "image_path" => $image->store('itemImages'),
                    "item_id"    => $item->item_id
                ]);
            }
        }elseif(isset($request->imagesDelete) && !$request->file('images')){
            $myImages = ItemImage::where('image_id', $request->imagesDelete)->get();
            foreach($myImages as $image){
                Storage::delete($image->image_path);
            }
            // dd('hallo');
            $this->queryDeleteImages($request->imagesDelete);
        }elseif($request->file('images') && !$request->imagesDelete){
            $request->validate([
                'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
            ], $cusMessage);
            foreach($request->file('images') as $image){
                ItemImage::create([
                    "image_name" => $image->getClientOriginalName(),
                    "image_size" => $image->getSize(),
                    "image_path" => $image->store('itemImages'),
                    "item_id"    => $item->item_id
                ]);
            }
        }

        return redirect()->route('listBarang')->with('message', 'Data barang berhasil diubah');
    }

    public function queryUpdateImages($data, $params){
        Item::where('item_id', $params->item_id)->update([
            "item_name" => $data->item_name,
            "initial_price" => $data->initial_price,
            "description" => $data->description,
            "item_main_image" => $data->image->store('itemImages')
        ]);

    }

    public function queryDeleteImages($params){
        foreach($params as $hole){  
            ItemImage::where('image_id', $hole)->delete();
        }
    }

    public function queryAddImages($data, $params){
        ItemImage::create([
            "image_name" => $data->getClientOriginalName(),
            "image_size" => $data->getSize(),
            "image_path" => $data->store('itemImages'),
            "item_id"    => $params
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $parent = Item::find($item->item_id);
        foreach ($parent->images as $value) {
            if($value){
                Storage::delete($value->image_path);
            }
            $value->delete();
        }
        Storage::delete($parent->item_main_image);
        $parent->delete();

        return back();
    }
}
