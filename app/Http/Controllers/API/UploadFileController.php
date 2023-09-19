<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UploadFileController extends Controller
{
    public function storeFile(Request $request)
    {
        $user = Auth::id();
        $file = null;

        if ($request->file('folder_name')) {
            $uploadedFile = $request->file('folder_name');
            $originalFileName = $uploadedFile->getClientOriginalName();

            $file = $uploadedFile->storeAs('folder-file', $originalFileName, 'public');
        }

        if ($file) {
            $DataCenter = DataCenter::create([
                'folder_name' => $file,
                'users_id' => $user,
                'tanggal' => date('Y-m-d'),
            ]);

            return response()->json(['data' => $DataCenter], 200);
        } else {
            return response()->json(['data' => 'Error'], 400);
        }
    }
}
