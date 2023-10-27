<?php

namespace App\Http\Controllers;

use App\Models\DataCenter;
use App\Models\LogEdit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function getLogin()
    {
        return view('auth.login');
    }

    public function index()
    {
        $datacenterFile = DataCenter::select(
            DB::raw('DATE_FORMAT(tanggal, "%M %Y") as month_year'),
            DB::raw('COUNT(*) as count')
        )
            ->where('folder_name', 'LIKE', 'folder-file%')
            ->groupBy('month_year')
            ->get();

        $datacenterNonFile = DataCenter::select(
            DB::raw('DATE_FORMAT(tanggal, "%M %Y") as month_year'),
            DB::raw('COUNT(*) as count')
        )
            ->where('folder_name', 'NOT LIKE', 'folder-file%')
            ->groupBy('month_year')
            ->get();

        $rolesToCount = ['bidang/upt', 'staff', 'seksi'];

        $roleBidangUpt = 'bidang_upt';
        $roleSeksi = 'seksi';
        $roleStaff = 'staff';
        $folderToExclude = 'folder-file%';
        $folderToInclude = 'folder-file%';

        $totalFolderBidangUpt = DataCenter::whereHas('Users', function ($query) use ($roleBidangUpt) {
            $query->where('roles', $roleBidangUpt);
        })
            ->whereNotIn('id', function ($subQuery) use ($folderToExclude) {
                $subQuery->from('data_centers')->select('id')->where('folder_name', 'like', $folderToExclude);
            })
            ->count();
        $totalFolderSeksi = DataCenter::whereHas('Users', function ($query) use ($roleSeksi) {
            $query->where('roles', $roleSeksi);
        })
            ->whereNotIn('id', function ($subQuery) use ($folderToExclude) {
                $subQuery->from('data_centers')->select('id')->where('folder_name', 'like', $folderToExclude);
            })
            ->count();
        $totalFolderStaff = DataCenter::whereHas('Users', function ($query) use ($roleStaff) {
            $query->where('roles', $roleStaff);
        })
            ->whereNotIn('id', function ($subQuery) use ($folderToExclude) {
                $subQuery->from('data_centers')->select('id')->where('folder_name', 'like', $folderToExclude);
            })
            ->count();
        //
        $totalFilerBidangUpt = DataCenter::whereHas('Users', function ($query) use ($roleBidangUpt) {
            $query->where('roles', $roleBidangUpt);
        })
            ->whereIn('id', function ($subQuery) use ($folderToInclude) {
                $subQuery->from('data_centers')->select('id')->where('folder_name', 'like', $folderToInclude);
            })
            ->count();
        $totalFilerSeksi = DataCenter::whereHas('Users', function ($query) use ($roleSeksi) {
            $query->where('roles', $roleSeksi);
        })
            ->whereIn('id', function ($subQuery) use ($folderToInclude) {
                $subQuery->from('data_centers')->select('id')->where('folder_name', 'like', $folderToInclude);
            })
            ->count();
        $totalFilerStaff = DataCenter::whereHas('Users', function ($query) use ($roleStaff) {
            $query->where('roles', $roleStaff);
        })
            ->whereIn('id', function ($subQuery) use ($folderToInclude) {
                $subQuery->from('data_centers')->select('id')->where('folder_name', 'like', $folderToInclude);
            })
            ->count();

        return view('components.dashboard', compact('datacenterFile', 'totalFilerStaff', 'totalFolderStaff', 'totalFilerSeksi', 'totalFolderSeksi', 'datacenterNonFile', 'totalFolderBidangUpt', 'totalFilerBidangUpt'));
    }

    public function dataset()
    {
        $user = Auth::user();

        if ($user->roles == 'super_admin') {
            $data = DataCenter::where('parent_name_id', null)
                ->where('is_recycle', true)
                ->get();
        } elseif ($user->roles == 'bidang_upt') {
            $data = DataCenter::where('parent_name_id', null)
                ->where('is_recycle', true)
                ->whereHas('Users',  function ($query) {
                    $query->where('roles', 'bidang_upt');
                })
                ->get();
        } elseif ($user->roles == 'seksi') {
            $data = DataCenter::where('parent_name_id', null)
                ->where('is_recycle', true)
                ->whereHas('Users',  function ($query) {
                    $query->where('roles', 'seksi');
                })
                ->get();
        } elseif ($user->roles == 'staff') {
            $data = DataCenter::where('parent_name_id', null)
                ->where('is_recycle', true)
                ->whereHas('Users',  function ($query) {
                    $query->where('roles', 'staff');
                })
                ->get();
        }

        return view('components.dataset', compact('data'));
    }

    public function getDetails(Request $request, $id)
    {
        $details = DataCenter::where('id', $id)->first();
        $folder = DataCenter::where('parent_name_id', $id)
            ->where('is_recycle', true)
            ->get();
        return view('components.details', compact('details', 'folder'));
    }

    public function getSampah()
    {
        $user = Auth::user();

        if ($user->name === 'super_admin') {
            $data = DataCenter::where('parent_name_id', null)
                ->get();
        } else {
            $data = DataCenter::where('users_id', $user->id)
                ->where('parent_name_id', null)
                ->get();
        }

        if ($user->name === 'super_admin') {
            $data = DataCenter::where('users_id', $user->id)
                ->where('is_recycle', 0)
                ->get();
        } else {
            $data = DataCenter::where('users_id', $user->id)
                ->where('is_recycle', 0)
                ->get();
        }

        return view('components.sampah-data', compact('data'));
    }

    public function putEditFolder(Request $request, $id)
    {
        $user = Auth::user();

        $update = DataCenter::where('id', $id)->first();

        $update->update([
            'folder_name' => $request->input('folder_name')
        ]);

        LogEdit::create([
            'users_id' => $user->id,
            'file_id' => $update->id
        ]);

        return redirect()->back()->with('status', 'Selamat data anda berhasil diperbarui');
    }

    public function putNameFolder(Request $request, $id)
    {
        $status = DataCenter::find($id);

        $status->update([
            'is_recycle' => 0
        ]);

        return redirect()->back()->with('status', 'Selamat folder anda berhasil diperbarui');
    }

    public function putPulihkanNamaFolder(Request $request, $id)
    {
        $status = DataCenter::find($id);

        $status->update([
            'is_recycle' => 1
        ]);

        return redirect()->back()->with('status', 'Selamat folder anda berhasil diperbarui');
    }
}
