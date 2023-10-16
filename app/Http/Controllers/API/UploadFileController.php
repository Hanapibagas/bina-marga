<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
                'parent_name_id' => $request->input('parent_name_id'),
                'tanggal' => date('Y-m-d'),
            ]);

            return response()->json([
                'message' => 'Login successful.',
                'data' => $DataCenter
            ], 200);
        } else {
            return response()->json(['data' => 'Error'], 400);
        }
    }

    public function Folder(Request $request)
    {
        $user = Auth::id();

        $DataCenter = DataCenter::create([
            'folder_name' => $request->input('folder_name'),
            'users_id' => $user,
            'parent_name_id' => $request->input('parent_name_id'),
            'tanggal' => date('Y-m-d'),
        ]);

        if ($DataCenter) {
            return response()->json([
                'message' => 'Login successful.',
                'data' => $DataCenter
            ], 200);
        } else {
            return response()->json(['data' => 'Error'], 400);
        }
    }

    public function getListData()
    {
        $user = Auth::user();

        if ($user->hasRole('super_admin')) {
            $dataCenters = DataCenter::where('is_recycle', true)->get();
        } else {
            $userId = $user->id;
            $dataCenters = DataCenter::where('users_id', $userId)
                ->where('is_recycle', true)
                ->get();
        }

        $responseData = [];

        foreach ($dataCenters as $dataCenter) {
            $fileExtension = pathinfo($dataCenter->folder_name, PATHINFO_EXTENSION);

            $fileType = 'folder';
            if (in_array($fileExtension, ['pdf', 'xls', 'xlsx', 'doc', 'docx', 'jpeg', 'jpg', 'png'])) {
                $fileType = $fileExtension;
            }

            $fileUrl = null;
            if (file_exists(public_path('storage/' . $dataCenter->folder_name))) {
                $fileUrl = asset('storage/' . $dataCenter->folder_name);
            }
            if ($fileType != "folder") {
                $fileSize = filesize(public_path('storage/' . $dataCenter->folder_name));

                if ($fileSize >= 1024 * 1024 * 1024) {
                    $formattedSize = round($fileSize / (1024 * 1024 * 1024), 2) . ' GB';
                } elseif ($fileSize >= 1024 * 1024) {
                    $formattedSize = round($fileSize / (1024 * 1024), 2) . ' MB';
                } elseif ($fileSize >= 1024) {
                    $formattedSize = round($fileSize / 1024, 2) . ' KB';
                } else {
                    $formattedSize = $fileSize . ' B';
                }
            } else {
                $formattedSize = null;
            }

            $responseData[] = [
                'id' => $dataCenter->id,
                'fileName' => $dataCenter->folder_name,
                'fileType' => $fileType,
                'fileSize' => $formattedSize ?: null,
                'timeAgo' => $dataCenter->created_at->diffForHumans(),
                'fileUrl' => $fileUrl,
                'parentNameId' => $dataCenter->parent_name_id,
                'users' => $dataCenter->users,
            ];
        }

        return response()->json([
            'message' => 'Login successful.',
            'data' => $responseData
        ]);
    }

    public function getListFoder()
    {
        $user = Auth::user();
        $userId = $user->id;

        if ($user->hasRole('super_admin')) {
            $dataCenters = DataCenter::where('is_recycle', true)->get();
        } else {
            $dataCenters = DataCenter::where('users_id', $userId)
                ->where('is_recycle', true)
                ->get();
        }

        $responseData = [];

        foreach ($dataCenters as $dataCenter) {
            $folderName = $dataCenter->folder_name;

            if (strpos($folderName, 'folder-file') !== 0) {
                $responseData[] = [
                    'id' => $dataCenter->id,
                    'fileName' => $folderName,
                    'users_id' => $dataCenter->Users,
                ];
            }
        }

        return response()->json([
            'message' => 'Login successful.',
            'data' => $responseData,
        ]);
    }

    public function getListFile()
    {
        $user = Auth::user();
        $userId = $user->id;

        if ($user->hasRole('super_admin')) {
            $dataCenters = DataCenter::where('is_recycle', true)->get();
        } else {
            $dataCenters = DataCenter::where('users_id', $userId)
                ->where('is_recycle', true)
                ->get();
        }

        $responseData = [];

        foreach ($dataCenters as $dataCenter) {
            $folderName = $dataCenter->folder_name;

            if (str_starts_with($folderName, 'folder-file')) {
                $responseData[] = [
                    'id' => $dataCenter->id,
                    'fileName' => $folderName,
                    'users_id' => $dataCenter->users
                ];
            }
        }

        return response()->json([
            'message' => 'Login successful.',
            'data' => $responseData
        ]);
    }

    public function putEditFolder(Request $request, $id)
    {
        $dataCenter = DataCenter::find($id);

        if (!$dataCenter) {
            return response()->json(['error' => 'DataCenter not found'], 404);
        }

        $dataCenter->folder_name = $request->input('folder_name');
        $dataCenter->save();

        return response()->json([
            'message' => 'DataCenter updated successfully',
            'data' => $dataCenter
        ]);
    }

    public function putEditStatus(Request $request, $id)
    {
        $dataCenter = DataCenter::find($id);

        if (!$dataCenter) {
            return response()->json(['error' => 'DataCenter not found'], 404);
        }

        $dataCenter->is_recycle = $request->input('is_recycle');
        $dataCenter->save();

        return response()->json([
            'message' => 'DataCenter updated successfully',
            'data' => $dataCenter
        ]);
    }
}
