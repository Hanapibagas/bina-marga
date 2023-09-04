<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_name',
        'slug',
        'users_id',
        'parent_name_id',
        'is_recycle',
        'tanggal',
    ];

    public function Users()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
