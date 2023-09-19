<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function getIndex()
    {
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->get();;

        return view('components.pengumuman', compact('pengumuman'));
    }

    public function storePengumuman(Request $request)
    {
        Pengumuman::create([
            'judul' => $request->input('judul'),
            'keterangan' => $request->input('keterangan'),
            'tannggal' => $request->input('tannggal'),
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }

    public function putPengumuman(Request $request, $id)
    {
        $pengumuman = Pengumuman::where('id', $id)->first();

        $pengumuman->update([
            'judul' => $request->input('judul'),
            'keterangan' => $request->input('keterangan'),
            'tannggal' => $request->input('tannggal'),
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil diperbarui');
    }

    public function deletePengumuman($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->first();

        $pengumuman->delete();

        return redirect()->back()->with('status', 'Selamat data anda berhasil dihapus');
    }
}
