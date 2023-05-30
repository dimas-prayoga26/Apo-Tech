<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Courier;
use App\Models\Permission;
use App\Models\StatusUser;
use App\Models\UserApotech;
use App\Models\UserType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            DB::beginTransaction();
            $roles = ['admin', 'buyer', 'seller', 'courier'];

            foreach ($roles as $data) {
                $role = Role::updateOrCreate([
                    'name'  => $data,
                    // 'guard_name' => 'web'
                ]);
            }

            $permissions = ['users-seller', 'user-admin'];

            foreach ($permissions as $data) {
                Permission::updateOrCreate([
                    'name'  => $data,
                    // 'guard_name' => 'web'
                ]);
            }
    
            $status = ['unverified', 'verified'];
    
            foreach ($status as $data) {
                StatusUser::updateOrCreate([
                    'name'  => $data
                ]);
            }

            $status = StatusUser::where('name', 'verified')->first();

            $address1 = Address::create([
                'kabupaten'      => 'KABUPATEN INDRAMAYU',
                    'kecamatan'      => 'KROYA',
                    'desa'           => 'SUMBON',
                    'full_address'   => 'BLOK SUMBON 1',
            ]);
            $address2 = Address::create([
                'kabupaten'      => 'KABUPATEN INDRAMAYU',
                    'kecamatan'      => 'GABUS WETAN',
                    'desa'           => 'KEDOKAN GABUS',
                    'full_address'   => 'KARANG SENGON',
            ]);
            $address3 = Address::create([
                'kabupaten'      => 'KABUPTEN INDRAMAYU',
                'kecamatan'      => 'TRISI',
                'desa'           => 'CIKEDUNG',
                'full_address'   => 'CIKEDUNG',
            ]);
            $address4 = Address::create([
                'kabupaten'      => 'KABUPATEN INDRAMAYU',
                    'kecamatan'      => 'LOSARANG',
                    'desa'           => 'LOSARANG',
                    'full_address'   => 'LOSARANG',
            ]);
    
            $admin = User::create([
                'username' => 'superAdmin',
                'email' => 'superadmin@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status->id,
            ])->assignRole(['admin']);

            UserApotech::create([
                'user_id'       => $admin->id,
                'first_name'    => 'Super',
                'last_name'     => 'Admin',
                'phone_number'  => '12345',
                'image'         => 'virtual/assets/img/faces/6.png',
                'latitude'      => '-6.425721',
                'longitude'     => '108.081242',
                'address_id'    => $address1->id,
                'registered_at' => date('Y-m-d')
            ]);

            $courier = User::create([
                'username' => 'Courier123',
                'email' => 'courier@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status->id,
            ])->assignRole(['courier']);

            UserApotech::create([
                'user_id'       => $courier->id,
                'first_name'    => 'Courier',
                'last_name'     => 'Expedition',
                'phone_number'  => '12345',
                'image'         => 'virtual/assets/img/faces/6.png',
                'latitude'      => '-6.425721',
                'longitude'     => '108.081242',
                'address_id'    => $address2->id,
                'registered_at' => date('Y-m-d')
                
            ]); 


            // =========================USER SELLER DAN USER BUYER======================================

            $Users_Seller = User::create([
                'username' => 'seller',
                'email' => 'seller@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status->id,
            ])->assignRole('seller');

            $Users_Buyer = User::create([
                'username' => 'buyer',
                'email' => 'buyer@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status->id,
                ])->assignRole('buyer');
                

                $Users = [
                [
                    'user_id'                   => $Users_Seller->id,
                    'first_name'                => 'Its',
                    'last_name'                 => 'Seller',
                    'phone_number'              => '12345',
                    'image'                     => 'images/dimasSeller.jpg',
                    'latitude'                  => '-6.425721',
                    'longitude'                 => '108.081242',
                    'address_id'    => $address3->id,
                    'registered_at'             => date('Y-m-d'),
                    'jenis_kelamin'             => 'Laki-Laki'
                ],[
                    'user_id'                   => $Users_Buyer->id,
                    'first_name'                => 'Its',
                    'last_name'                 => 'Buyer',
                    'phone_number'              => '67890',
                    'image'                     => 'images/dimasSeller.jpg',
                    'latitude'                  => '-6.425721',
                    'longitude'                 => '108.081242',
                    'address_id'    => $address4->id,
                    'registered_at'             =>  date('Y-m-d'),
                    'jenis_kelamin'             => 'Perempuan'
                ],
            ];

            foreach ($Users as $data) {
                $user = UserApotech::updateOrCreate($data);
            } 

            // $user[0]->assignRole('seller');
            // $user[1]->assignRole('buyer');
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            
            echo $e->getMessage();
        }
        
        
    }
}
