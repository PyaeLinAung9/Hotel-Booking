<?php

namespace App\Models;

use App\Models\View;
use App\Models\RoomGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = [
        'id',
        'name',
        'occupation',
        'bed',
        'view',
        'size',
        'price_per_day',
        'extra_bed_price',
        'description',
        'detail',
        'thumbnail_image',
        'updated_by',
        'created_by',
        'deleted_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getViewByRoom():BelongsTo {
        return $this->belongsTo(View::class,'view','id');
    }

    public function getImageFromGallery():HasMany {
        return $this->hasMany(RoomGallery::class,'room_id','id');
    }

}
