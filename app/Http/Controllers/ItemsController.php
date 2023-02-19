<?php

namespace App\Http\Controllers;

use App\Models\Aucation;
use App\Models\Item;
use App\Models\Brand;
use App\Models\ItemImage;
use App\Models\ItemCategory;
use App\Models\ItemDetail;
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
        if (Auth()->guard('officer')->user()->level_id == 1) {
            $data['items'] = Item::all();
            # code...
        }else{
            $data['items'] = Item::where('officer_id', Auth()->guard('officer')->user()->officer_id)->get();
        }

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
        $data['categories'] = ItemCategory::all();
        $data['brands']     = Brand::all();

        return view('Admin.DataTables.TambahBarang', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function itemReqValidate($request){
        $cusMessage = [
            "item_name.required" => "Nama barang harus di isi",
            "images.required" => "Gambar harus di isi",
            "camera.required" => "Resolusi kamera harus di isi",
            "display"         => "Resolusi layar harus di isi",
            "battery.required" => "Kapasitas batrai harus di isi",
            "chipset.required" => "Chipset barang harus di isi",
            "storage.required" => "Kapasitas penyimpanan barang harus di isi",
            "images.*.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "images.*.max" => "Ukuran maksimal gambar 2MB"
        ];
        // dd($request->images);
        $request->validate([
            'item_name' => 'required',
            'description'   => 'required',
            'display'   => 'required',
            'camera'   => 'required',
            'chipset'   => 'required',
            'battery'   => 'required',
            'storage'   => 'required',
            'images'  => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
        ], $cusMessage);
    }

    public function storeDetail($data, $param){
        $storeDetail = ItemDetail::create([
            "camera" => $data->camera,
            "display"=> $data->display,
            "chipset"=> $data->chipset,
            "battery"=> $data->battery,
            "storage"=> $data->storage,
            "brand_id" => $data->brand,
            "condition"=>$data->condition,
            "item_id" => $param
        ]);
    }

    public function store(Request $request)
    {
        
        $this->itemReqValidate($request);
        
        DB::transaction(function() use($request){
            $storeItems = Item::create([
                "item_name" => $request->item_name,
                "description" => $request->description,
                "category_id" => $request->category,
                "officer_id"  => Auth()->guard('officer')->user()->officer_id,
                "item_main_image" => $request->file('images')[0]->store('itemImages')
            ]);

            $this->storeDetail($request, $storeItems->item_id);

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
        return redirect()->route('listBarang')->with('success', "Data berhasil ditambahkan");
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
        $data['categories'] = ItemCategory::all();
        $data['brands']     = Brand::all();

        return view('Admin.DataTables.TambahBarang', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function updateDetail($data, $param){
        $updateDetail = ItemDetail::where('item_id', $param)->update([
            "camera" => $data->camera,
            "display"=> $data->display,
            "chipset"=> $data->chipset,
            "battery"=> $data->battery,
            "storage"=> $data->storage,
            "brand_id" => $data->brand,
            "condition"=>$data->condition,
        ]);
    }
    public function update(Request $request, Item $item)
    {
        // foreach($request->imagesDelete as $image){
            
        // }
        // dd($request->all());
        $cusMessage = [
            "item_name.required" => "Nama barang harus di isi",
            "images.required" => "Gambar harus di isi",
            "camera.required" => "Resolusi kamera harus di isi",
            "display"         => "Resolusi layar harus di isi",
            "battery.required" => "Kapasitas batrai harus di isi",
            "chipset.required" => "Chipset barang harus di isi",
            "storage.required" => "Kapasitas penyimpanan barang harus di isi",
            "images.*.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "images.*.max" => "Ukuran maksimal gambar 2MB"
        ];
        // dd($request->images);
        $request->validate([
            'item_name' => 'required',
            'description'   => 'required',
            'display'   => 'required',
            'camera'   => 'required',
            'chipset'   => 'required',
            'battery'   => 'required',
            'storage'   => 'required',
        ], $cusMessage);

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048'
            ], $cusMessage);
            $item->item_main_image !== null ? Storage::delete($item->item_main_image) : '';
            DB::transaction(function() use($request, $item){
                $this->queryUpdateImages($request, $item);
                Item::where('item_id', $item->item_id)->update([
                    "item_name" => $request->item_name,
                    "description" => $request->description,
                ]);
                $this->updateDetail($request, $item->item_id);
            });
        }else{
            DB::transaction(function() use($request, $item){
                Item::where('item_id', $item->item_id)->update([
                    "item_name" => $request->item_name,
                    "description" => $request->description,
                ]);
                $this->updateDetail($request, $item->item_id);
            });
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

        return redirect()->route('listBarang')->with('success', 'Data barang berhasil diubah');
    }

    public function queryUpdateImages($data, $params){
        Item::where('item_id', $params->item_id)->update([
            "item_name" => $data->item_name,
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
        if(Aucation::where('item_id', $item->item_id)->get()){
            return back()->with('error', 'Barang ini sedang di lelang');
        }

        foreach ($parent->images as $value) {
            if($value){
                Storage::delete($value->image_path);
            }
            $value->delete();
        }
        Storage::delete($parent->item_main_image);
        $parent->delete();

        return back()->with('success', 'Berhasil menghapus data barang');
    }
}
