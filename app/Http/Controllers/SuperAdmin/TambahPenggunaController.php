<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class TambahPenggunaController extends Controller
{
    public function getStorePengguna(Request $request)
    {
        $q = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'roles' => request('roles'),
            'password' => bcrypt('12345678'),
        ]);

        dd($q);
    }
}
