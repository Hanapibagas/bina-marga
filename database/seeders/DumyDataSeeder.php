<?php

namespace Database\Seeders;

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
            'nama_penanggung_jawab' => '0 ',
            'nip_oprator' => '0',
            'email' => 'superadmin@admin.com',
            'roles' => 'super_admin',
            'password' => bcrypt('12345678')
        ]);
    }
}
