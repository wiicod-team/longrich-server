<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        factory(\App\Product::class,40)->create();
        $path =base_path("database/seeds/json/products.json");
        $items = json_decode(file_get_contents($path),true);
        foreach ($items as $item){
            $c = $item['category'];
            $u= \App\Category::where('name','=',$c)->first();
            if($u){
                $item['category_id'] = $u->id;
                if(isset($item['picture1'])){
                    $fop =base_path("database/seeds/json/images/products/picture/".$item['picture1']);
                    if (Storage::has($fop))
                        Storage::delete($fop);
                    $fpath = "img/products/picture/" . uniqid() .'_'. $item['picture1'].'.png' ;
                    $item['picture1'] = $fpath;
                    Storage::put($fpath, File::get($fop));
                }
                unset($item['category']);
                unset($item['picture2']);
                unset($item['picture3']);
                \App\Product::create($item);
            }
        }
    }
}
