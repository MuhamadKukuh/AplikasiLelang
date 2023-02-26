<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Aucation;
use App\Models\Brand;
use App\Models\Item;
use App\Models\Level;
use App\Models\ItemCategory;
use App\Models\ItemDetail;
use App\Models\Officer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Level::create([
            "level" => "Administrator"
        ]);
        
        Level::create([
            "level" => "Officer"
        ]);

        ItemCategory::create([
            'category' => "Smartphone",
        ]);

        ItemCategory::create([
            'category' => "Laptop",
        ]);

        Brand::create([
            'brand_name' => "Xiaomi"
        ]);
        
        Brand::create([
            'brand_name' => "Lenovo"
        ]);

        Officer::create([
            "officer_name" => "Apple",
            "username"     => "Appleee",
            "password"     => Hash::make("password"),
            "level_id"     => 1
        ]);

        for ($i=0; $i < 50; $i++) { 
            DB::transaction(function() use ($i){
                $createItems = Item::create([
                    'item_name' => "barang ". $i,
                    'description' => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam fugiat ab aliquid nisi error id explicabo! Reiciendis ad, quas praesentium dolorem aut omnis tempora at dolore possimus incidunt laborum eum similique nesciunt quos tenetur, nulla dolor est quibusdam ipsam autem cumque, nemo soluta quasi tempore! Rerum exercitationem eveniet atque aliquid nulla enim. Itaque voluptatum doloribus expedita temporibus architecto. Asperiores magnam, ratione aperiam quasi, voluptatibus quae, accusamus eos non repellendus rerum minus nisi tenetur ea laborum? Itaque rem tenetur beatae eum, quidem odit, at, quis fuga quisquam facere saepe numquam iste distinctio temporibus repellendus nihil quo! Harum, atque repellendus? Odit, dolorem?",
                    "officer_id" => 1,
                    "category_id" => collect([1, 2])->random(1)[0],
                    "item_main_image" => collect(["imagesAsset/phonePNG.png", "imagesAsset/laptop.jpg"])->random(1)[0]
                ]);

                $createDetails = ItemDetail::create([
                    'item_id' => $createItems->item_id,
                    "camera"  => collect(["48mp", "720px Kamera depan"])->random(1)[0],
                    "battery" => collect([5000, 65])->random(1)[0],
                    "brand_id"=> collect([1, 2])->random(1)[0],
                    "chipset" => collect(["SD 888+", "INTEL CORE I9 12000"])->random(1)[0],
                    "condition" => collect(["new", "used"])->random(1)[0],
                    "display" => collect(["FHD+ IPS", "HD+ TN Panel"])->random(1)[0],
                    "storage" => collect(['8/126gb', '8gb dual chanel SODIM, 1tb SSD M.2 NVME'])->random(1)[0]
                ]);

                $createAucation = Aucation::create([
                    'item_id' => $createItems->item_id,
                    'status'  => collect(['opened', 'closed'])->random(1)[0],
                    'aucation_date' => collect([date("Y-m-d"), "2023-04-28"])->random(1)[0],
                    'initial_price' => collect(['1000000', '2000000', '3000000'])->random(1)[0],
                    'officer_id'    => 1,
                    'multiple_bid' => collect(['100000', '50000'])->random(1)[0]
                ]);

            });
        }
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
