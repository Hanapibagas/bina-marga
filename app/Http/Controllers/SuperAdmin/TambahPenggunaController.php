<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TambahPenggunaController extends Controller
{
    public function getStorePengguna(Request $request)
    {
        User::create([
            'nama_penanggung_jawab' => request('nama_penanggung_jawab'),
            'nip_oprator' => request('nip_oprator'),
            'name' => request('name'),
            'email' => request('email'),
            'roles' => request('roles'),
            'password' => bcrypt('12345678'),
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }
}
