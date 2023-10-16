<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TambahPenggunaController extends Controller
{
    public function getStorePengguna(Request $request)
    {
        User::create([
            'name' => request('name'),
            'email' => request('email'),
            'nama_penanggung_jawab' => request('nama_penanggung_jawab'),
            'nip_oprator' => request('nip_oprator'),
            'roles' => request('roles'),
            'permission_edit' => request('permission_edit'),
            'permission_delete' => request('permission_delete'),
            'permission_upload' => request('permission_upload'),
            'permission_create' => request('permission_create'),
            'permission_download' => request('permission_download'),
            'password' => bcrypt('12345678'),
        ]);

        return redirect()->back()->with('status', 'Pengguna berhasil ditambahkan.');
    }

    public function putUpdatepengguna(Request $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->update([
            'permission_edit' => request('permission_edit'),
            'permission_delete' => request('permission_delete'),
            'permission_upload' => request('permission_upload'),
            'permission_create' => request('permission_create'),
            'permission_download' => request('permission_download')
        ]);

        return redirect()->back()->with('status', 'Pengguna berhasil diperbarui.');
    }
}
