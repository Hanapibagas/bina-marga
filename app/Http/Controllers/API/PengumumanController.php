<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function getIndexPengmumumann()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();

        return response()->json($pengumuman);
    }
}
