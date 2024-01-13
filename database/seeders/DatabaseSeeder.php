<?php

namespace Database\Seeders;

use App\Models\User;  
use Illuminate\Database\Seeder;  
use Spatie\Permission\Models\Permission;  
use Spatie\Permission\Models\Role;  
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'dashboard']);

        Permission::create(['name' => 'view produk']);
        Permission::create(['name' => 'create produk']);
        Permission::create(['name' => 'update produk']);
        Permission::create(['name' => 'delete produk']);
        Permission::create(['name' => 'publish produk']);
        Permission::create(['name' => 'unpublish produk']);

        Permission::create(['name' => 'view transaksi']);
        Permission::create(['name' => 'update transaksi']);
        Permission::create(['name' => 'delete transaksi']);
        Permission::create(['name' => 'publish transaksi']);
        Permission::create(['name' => 'unpublish transaksi']);

        Permission::create(['name' => 'view pengembalian']);
        Permission::create(['name' => 'update pengembalian']);
        Permission::create(['name' => 'delete pengembalian']);
        Permission::create(['name' => 'publish pengembalian']);
        Permission::create(['name' => 'unpublish pengembalian']);

        Permission::create(['name' => 'view profil']);
        Permission::create(['name' => 'view keranjang']);
        Permission::create(['name' => 'tambah keranjang']);
        Permission::create(['name' => 'beli langsung']);
        Permission::create(['name' => 'view pembayaran']);
        Permission::create(['name' => 'proses pembayaran']);
        
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo('dashboard');
        $adminRole->givePermissionTo('view produk');
        $adminRole->givePermissionTo('create produk');
        $adminRole->givePermissionTo('update produk');
        $adminRole->givePermissionTo('delete produk');
        $adminRole->givePermissionTo('publish produk');
        $adminRole->givePermissionTo('unpublish produk');
        $adminRole->givePermissionTo('view transaksi');
        $adminRole->givePermissionTo('update transaksi');
        $adminRole->givePermissionTo('delete transaksi');
        $adminRole->givePermissionTo('publish transaksi');
        $adminRole->givePermissionTo('unpublish transaksi');
        $adminRole->givePermissionTo('view pengembalian');
        $adminRole->givePermissionTo('update pengembalian');
        $adminRole->givePermissionTo('delete pengembalian');
        $adminRole->givePermissionTo('publish pengembalian');
        $adminRole->givePermissionTo('unpublish pengembalian');

        $customerRole = Role::create(['name' => 'customer']);
        $customerRole->givePermissionTo('view profil');
        $customerRole->givePermissionTo('view keranjang');
        $customerRole->givePermissionTo('tambah keranjang');
        $customerRole->givePermissionTo('beli langsung');
        $customerRole->givePermissionTo('view pembayaran');
        $customerRole->givePermissionTo('proses pembayaran');

        $user = User::factory()->create([
            "name" => "Jhon Doe",
            "email" => "jhondoe@gmail.com",
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($customerRole);

        $user = User::factory()->create([
            'name' => 'Example admin user',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678')
        ]);
        $user->assignRole($adminRole);
    }
}
