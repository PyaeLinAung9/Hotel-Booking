<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelSetting extends Model
{
    use HasFactory;

    protected $table = 'hotel_settings';

    protected $fillable = [
        'id',
        'name',
        'occupancy',
        'email',
        'online_number',
        'outline_number',
        'check_in',
        'check_out',
        'price_unit',
        'size_unit',
        'address',
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
