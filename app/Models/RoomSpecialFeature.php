<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoomSpecialFeature extends Model
{
    use HasFactory;

    protected $table = 'room_special_features';

    protected $fillable = [
        'id',
        'room_id',
        'feature_id',
        'updated_by',
        'created_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [];


}
