<?php

namespace Database\Seeders;

use Throwable;
use App\Models\Cart;
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
            $img = ['assets-image/p1.jpeg', 'assets-image/p2.jpeg', 'assets-image/p3.jpeg', 'assets-image/p4.jpeg', 'assets-image/p5.jpeg'];
            $img2 = ['assets-image/p5.jpeg', 'assets-image/p4.jpeg', 'assets-image/p3.jpeg', 'assets-image/p2.jpeg', 'assets-image/p1.jpeg'];
            $category = Category::create([
                'name' => 'Suplement',
                'image' => 'assets-image/p5.jpeg'
            ]);
            $category1 = Category::create([
                'name' => 'Vitamin',
                'image' => 'assets-image/p1.jpeg'
            ]);

            $user = User::role('admin')->first();
            $buyer = User::role('buyer')->first();

            $product = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Saw Palmeto',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);

            $product1 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Saw Palmeto',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);

            $product2 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);

            foreach($img as $data){
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product->id
                ]);
            }

            foreach($img as $data){
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product2->id
                ]);
            }

            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product1->id
                ]);
            }

            Cart::create([
                'user_id' => $buyer->id,
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_price' => $product->price,
                'display_image' => $img[0],
                'qty' => 2
            ]);
            Cart::create([
                'user_id' => $buyer->id,
                'product_id' => $product1->id,
                'product_name' => $product1->name,
                'product_price' => $product1->price,
                'display_image' => $img2[0],
                'qty' => 2
            ]);
            Cart::create([
                'user_id' => $buyer->id,
                'product_id' => $product2->id,
                'product_name' => $product2->name,
                'product_price' => $product2->price,
                'display_image' => $img[0],
                'qty' => 2
            ]);

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            echo $th;
        }
    }
}
