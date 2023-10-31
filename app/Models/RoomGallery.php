<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomGallery extends Model
{
    use HasFactory ,SoftDeletes;

    protected $table = 'room_galleries';

    protected $fillable = [
        'id',
        'room_id',
        'image',
        'updated_by',
        'created_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [];
}
