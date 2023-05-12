<?php

namespace Database\Seeders;

use Throwable;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
            DB::beginTransaction();

            $category = Category::create([
                'name' => 'Suplement'
            ]);

            $user = User::role('admin')->first();

            $product = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Saw Palmeto',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);

            ProductImage::create([
                'image' => 'assets-image\bgNew.png',
                'product_id' => $product->id
            ]);


            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            echo $th;
        }
    }
}
