<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name','admin')->first();
        $dosenRole = Role::where('name','dosen')->first();
        $mhsRole = Role::where('name','mhs')->first();

        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin719'), 
        ]);

        $dosen = User::create([
            'name' => 'Dosen',
            'email' => 'dosen@dosen.com',
            'password' => Hash::make('admin719'), 
        ]);

        $mhs = User::create([
            'name' => 'mhs',
            'email' => 'mhs@mhs.com',
            'password' => Hash::make('admin719'), 
        ]);

        $admin->roles()->attach($adminRole);
        $dosen->roles()->attach($dosenRole);
        $mhs->roles()->attach($mhsRole);
    }
}
