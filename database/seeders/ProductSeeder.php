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
                'category_id' => $category1->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product3 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product4 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product5 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product6 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product7 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product8 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product9 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product10 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product11 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product12 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product13 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product14 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product15 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product16 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product17 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product18 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product19 = Product::create([
                'category_id' => $category->id,
                'user_id' => $user->id,
                'name' => 'Finasteride',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat necessitatibus reprehenderit aliquam deserunt explicabo eveniet ipsum adipisci natus incidunt similique. Voluptas quas corrupti cupiditate aut qui! Itaque quo, maxime, molestiae a fugit quaerat tempora assumenda optio officiis eum cum. Optio quae accusamus tenetur, assumenda debitis porro atque sunt repellendus modi.',
                'stock' => 20,
                'is_need_prescription' => false,
                'price' => 150000,
            ]);
            $product20 = Product::create([
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

            DB::commit();
        } catch (Throwable $th) {
            DB::rollBack();

            echo $th;
        }
    }
}
