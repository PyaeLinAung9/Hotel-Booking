<?php
namespace App\Rules;

use App\Constant;
use Carbon\Carbon;
use App\Models\Booking;
use Illuminate\Contracts\Validation\Rule;

class ReservationOverlapRule implements Rule
{
    private $roomId;
    private $checkInDate;
    private $checkOutDate;

    public function __construct($roomId, $checkInDate, $checkOutDate)
    {
        $this->roomId       = $roomId;
        $this->checkInDate  = Carbon::parse($checkInDate);
        $this->checkOutDate = Carbon::parse($checkOutDate);
    }

    public function passes($attribute, $value)
    {
        $check_in_count  = Booking::where('check_in','<=',$this->checkInDate)
                        ->where('check_out','>',$this->checkInDate)
                        ->where('status',Constant::RESERVE_ACCEPT)
                        ->where('room_id',$this->roomId)
                        ->whereNull('deleted_at')
                        ->count();
        $check_out_count  = Booking::where('check_in','<',$this->checkOutDate)
                        ->where('check_out','>=',$this->checkOutDate)
                        ->where('status',Constant::RESERVE_ACCEPT)
                        ->where('room_id',$this->roomId)
                        ->wherenull('deleted_at')
                        ->count();
        return $check_in_count === 0 && $check_out_count === 0;
    }

    public function message()
    {
        return 'The room is already reserved for the selected date range.';
    }
};
