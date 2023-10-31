<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SpecialFeature extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'special_features';

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

    public function getRoomsBySpecialFeature():HasMany {
        return $this->hisMany(RoomSpecialFeature::class,'feature_id','id');
    }
}
