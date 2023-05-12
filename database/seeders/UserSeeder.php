<?php

namespace Database\Seeders;

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
                'is_main'       => 1,
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
                'is_main'       => 1,
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
                    'registered_at'             => date('Y-m-d')
                ],[
                    'user_id'                   => $Users_Buyer->id,
                    'first_name'                => 'Its',
                    'last_name'                 => 'Buyer',
                    'phone_number'              => '67890',
                    'image'                     => 'images/dimasSeller.jpg',
                    'registered_at'             => date('Y-m-d')
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
