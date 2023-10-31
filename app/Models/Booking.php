<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'bookings';

    protected $fillable = [
        'id',
        'customer_id',
        'check_in',
        'check_out',
        'extra_bed',
        'total_price',
        'room_id',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $hidden = [];

    public function getCustomerInfo():BelongsTo {
        return $this->belongsTo(Customer::class,'customer_id','id');
    }

    public function getReserveRooms():BelongsTo {
        return $this->belongsTo(Room::class,'room_id','id');
    }


}
