<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarPenggunaController extends Controller
{
    public function getIndex()
    {
        $pengguna = User::where('id', '>', 1)->get();

        return view('components.list-pengguna', compact('pengguna'));
    }
}
