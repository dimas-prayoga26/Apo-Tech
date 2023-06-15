<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Courier;
use App\Models\UserType;
use App\Models\Permission;
use App\Models\StatusUser;
use App\Models\UserApotech;
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

            $status = ['unverified', 'verified','verification process'];

            foreach ($status as $data) {
                StatusUser::updateOrCreate([
                    'name'  => $data
                ]);
            }

            $status1 = StatusUser::where('name', 'verified')->first();
            $status2 = StatusUser::where('name', 'unverified')->first();



            // $address1 = Address::create([
            //     'kabupaten'      => 'KABUPATEN INDRAMAYU',
            //     'kecamatan'      => 'KROYA',
            //     'desa'           => 'SUMBON',
            //     'full_address'   => 'BLOK SUMBON 1',
            //     'latitude'      => '-6.425721',
            //     'longitude'     => '108.081242',
            //     'user_apotech_id' => $user_apotech->id
            // ]);
            // $address2 = Address::create([
            //     'kabupaten'      => 'KABUPATEN INDRAMAYU',
            //     'kecamatan'      => 'GABUS WETAN',
            //     'desa'           => 'KEDOKAN GABUS',
            //     'full_address'   => 'KARANG SENGON',
            //     'latitude'      => '-6.425721',
            //     'longitude'     => '108.081242',
            //     'user_apotech_id' => $user_apotech->id
            // ]);
            // $address3 = Address::create([
            //     'kabupaten'      => 'KABUPTEN INDRAMAYU',
            //     'kecamatan'      => 'TRISI',
            //     'desa'           => 'CIKEDUNG',
            //     'full_address'   => 'CIKEDUNG',
            //     'latitude'      => '-6.425721',
            //     'longitude'     => '108.081242',
            //     'user_apotech_id' => $user_apotech->id
            // ]);
            // $address4 = Address::create([
            //     'kabupaten'      => 'KABUPATEN INDRAMAYU',
            //     'kecamatan'      => 'LOSARANG',
            //     'desa'           => 'LOSARANG',
            //     'full_address'   => 'LOSARANG',
            //     'latitude'      => '-6.425721',
            //     'longitude'     => '108.081242',
            //     'user_apotech_id' => $user_apotech->id
            // ]);

            $admin = User::create([
                'username' => 'superAdmin',
                'email' => 'superadmin@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status1->id,
            ])->assignRole(['admin']);

            $adminP = UserApotech::create([
                'user_id'       => $admin->id,
                'first_name'    => 'Super',
                'last_name'     => 'Admin',
                'phone_number'  => '12345',
                'image'         => 'virtual/assets/img/faces/6.png',
                'registered_at' => date('Y-m-d')
            ]);

            Address::create([
                'user_apotech_id' => $adminP->id,
                'kecamatan' => 'Widasari',
                'desa' => 'Ujung Jaya',
                'full_address' => 'Desa ujung jaya blok A no.87',
                'latitude'      => '-6.327583',
                'longitude'     => '108.324936',
            ]);

            $courier = User::create([
                'username' => 'Courier123',
                'email' => 'courier@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status2->id,
            ])->assignRole(['courier']);

            $courierP = UserApotech::create([
                'user_id'       => $courier->id,
                'first_name'    => 'Courier',
                'last_name'     => 'Expedition',
                'phone_number'  => '12345',
                'image'         => 'virtual/assets/img/faces/6.png',
                'registered_at' => date('Y-m-d')

            ]);

            Address::create([
                'user_apotech_id' => $courierP->id,
                'kecamatan' => 'Widasari',
                'desa' => 'Ujung Jaya',
                'full_address' => 'Desa Leuwigede blok bugel no.09',
                'latitude'      => '-6.425721',
                'longitude'     => '108.081242',
            ]);


            // =========================USER SELLER DAN USER BUYER======================================

            $Users_Seller = User::create([
                'username' => 'seller',
                'email' => 'seller@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status1->id,
            ])->assignRole('seller');

            $Users_Buyer = User::create([
                'username' => 'buyer',
                'email' => 'buyer@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'status_user_id' => $status2->id,
            ])->assignRole('buyer');
    
            $sellerP = UserApotech::create(
                [
                    'user_id'                   => $Users_Seller->id,
                    'first_name'                => 'Its',
                    'last_name'                 => 'Seller',
                    'phone_number'              => '12345',
                    'image'                     => NULL,
                    'registered_at'             => date('Y-m-d')
                ]);

            $buyerP = UserApotech::create(
                [
                    'user_id'                   => $Users_Buyer->id,
                    'first_name'                => 'Its',
                    'last_name'                 => 'Buyer',
                    'phone_number'              => '67890',
                    'image'                     =>  NULL,
                    'registered_at'             => date('Y-m-d')
                ]
                );

                Address::create([
                    'user_apotech_id' => $sellerP->id,
                    'kecamatan' => 'Jatibarang',
                    'desa' => 'Ujung Jaya',
                    'full_address' => 'Desa bulak blok b no.78',
                    'latitude'      => '-6.425721',
                    'longitude'     => '108.081242',
                ]);
                Address::create([
                    'user_apotech_id' => $buyerP->id,
                    'kecamatan' => 'Jatibarang',
                    'desa' => 'Ujung Jaya',
                    'full_address' => 'Desa bulak blok b no.80',
                    'latitude'      => '-6.425721',
                    'longitude'     => '108.081242',
                ]);
            


            // $user[0]->assignRole('seller');
            // $user[1]->assignRole('buyer');

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            echo $e->getMessage();
        }
    }
}
