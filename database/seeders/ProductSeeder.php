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
            $img = ['assets-image/p1.jpg', 'assets-image/p2.jpg', 'assets-image/p3.jpg', 'assets-image/p4.jpg', 'assets-image/p5.jpg'];
            $img2 = ['assets-image/p5.jpg', 'assets-image/p4.jpg', 'assets-image/p3.jpg', 'assets-image/p2.jpg', 'assets-image/p1.jpg'];
            $category = Category::create([
                'name' => 'Suplement',
                'image' => 'assets-image/p6.png'
            ]);
            $category1 = Category::create([
                'name' => 'Vitamin',
                'image' => 'assets-image/p7.jpg'
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
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);

            $product1 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Saw Palmeto',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);

            $product2 = Product::create([
                'category_id' => $category1->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product3 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product4 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product5 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product6 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product7 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product8 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product9 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product10 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product11 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product12 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product13 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product14 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product15 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product16 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product17 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product18 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product19 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
            ]);
            $product20 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
                'kemasan' => 'tablet',
                'dosis' => '2 x 1',
                'golongan_obat' => 'Obat Bebas'
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
                    'product_id' => $product1->id
                ]);
            }

            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product2->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product3->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product4->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product5->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product6->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product7->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product8->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product9->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product10->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product11->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product12->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product13->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product14->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product15->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product16->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product17->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product18->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product19->id
                ]);
            }
            foreach ($img2 as $data) {
                ProductImage::create([
                    'image' => $data,
                    'product_id' => $product20->id
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
