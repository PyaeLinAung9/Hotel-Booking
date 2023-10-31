<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bed extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'beds';

    protected $fillable = [
        'id',
        'name',
        'updated_by',
        'created_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [];

    public function getRoomsByBed():HasMany {
        return $this->hasMany(Room::class,'bed','id');
    }
}
