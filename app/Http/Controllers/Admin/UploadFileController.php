<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ativitas;
use App\Models\DataCenter;
use App\Models\DownloadLog;
use App\Models\LogEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lcobucci\JWT\Token\DataSet;

class UploadFileController extends Controller
{
    public function storeFolder(Request $request)
    {
        $user = Auth::id();

        $slug = Str::slug($request->folder_name);
        $data = DataCenter::create([
            'folder_name' => $request->input('folder_name'),
            'users_id' => $user,
            'slug' => $slug,
            'tanggal' => date('Y-m-d'),
        ]);

        Ativitas::create([
            'users_id' => $user,
            'file_id' => $data->id
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }

    public function storeFile(Request $request)
    {
        $user = Auth::id();
        if ($request->file('folder_name')) {
            $uploadedFile = $request->file('folder_name');
            $originalFileName = $uploadedFile->getClientOriginalName();

            $file = $uploadedFile->storeAs('folder-file', $originalFileName, 'public');
        }

        $data = DataCenter::create([
            'folder_name' => $file,
            'users_id' => $user,
            'tanggal' => date('Y-m-d'),
        ]);

        Ativitas::create([
            'users_id' => $user,
            'file_id' => $data->id
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }

    public function postNameFolder(Request $request)
    {
        $user = Auth::id();

        $data = DataCenter::create([
            'folder_name' => $request->input('folder_name'),
            'users_id' => $user,
            'parent_name_id' => $request->input('parent_name_id'),
            'tanggal' => date('Y-m-d'),
        ]);

        Ativitas::create([
            'users_id' => $user,
            'file_id' => $data->id
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }

    public function postNameFile(Request $request)
    {
        $user = Auth::id();
        if ($request->file('folder_name')) {
            $uploadedFile = $request->file('folder_name');
            $originalFileName = $uploadedFile->getClientOriginalName();

            $file = $uploadedFile->storeAs('folder-file', $originalFileName, 'public');
        }

        $data = DataCenter::create([
            'folder_name' => $file,
            'users_id' => $user,
            'parent_name_id' => $request->input('parent_name_id'),
            'tanggal' => date('Y-m-d'),
        ]);

        Ativitas::create([
            'users_id' => $user,
            'file_id' => $data->id
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }

    public function putEditFolder(Request $request, $id)
    {
        $update = DataCenter::where('id', $id)->first();

        $update->update([
            'folder_name' => $request->input('folder_name')
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil terinput');
    }

    public function recordActivity1(Request $request, $id)
    {
        $userID = auth()->user()->id;

        $file = DataCenter::where('id', $id)->first();

        DownloadLog::create([
            'users_id' => $userID,
            'file_id' => $file->id,
        ]);

        return response()->download(public_path('storage/' . $file->folder_name));
    }
}
