<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DumyDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Super Admin',
            'nama_penanggung_jawab' => 'admin',
            'nip_oprator' => 'admin',
            'email' => 'superadmin@admin.com',
            'roles' => 'super_admin',
            'permission_edit' => '1',
            'permission_delete' => '1',
            'permission_upload' => '1',
            'permission_create' => '1',
            'permission_download' => '1',
            'password' => bcrypt('12345678')
        ]);
    }
}
