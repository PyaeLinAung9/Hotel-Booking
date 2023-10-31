<?php

namespace App\Repository\Reservation;

use DateTime;
use App\Utility;
use App\Constant;
use App\ReturnMessage;
use App\Models\Booking;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Repository\Reservation\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface {

    public function reserveRoom($data) {

        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        DB::beginTransaction();
        try{
            // dd($data);
            $formated_check_in  = date('Y-m-d', strtotime($data['check_in_date']));
            $formated_check_out = date('Y-m-d', strtotime($data['check_out_date']));

            $insert_check_in    = new DateTime($formated_check_in);
            $insert_check_out   = new DateTime($formated_check_out);
            $interval           = $insert_check_out->diff($insert_check_in);
            $daysDifference     = $interval->days;

            $price_per_day      = $data['price_per_day'];
            $extra_bed_price    = $data['extra_bed_price'];

            $extra_bed          = array_key_exists('extra-bed',$data) ?  1 : 0 ;

            if($extra_bed == 1) {
                $total_price    = ($price_per_day + $extra_bed_price)  * $daysDifference;
            }else{
                $total_price    = $price_per_day * $daysDifference;
            }
            $customer_name      = $data['cus-name'];
            $customer_email     = $data['cus-email'];
            $customer_phone     = $data['cus-phone'];
            $customer_id        = self::getCustomerId($customer_name,$customer_email,$customer_phone);

            $room               = new Booking;
            $room->room_id      = $data['room-id'];
            $room->check_in     = $formated_check_in;
            $room->check_out    = $formated_check_out;
            $room->extra_bed    = $extra_bed;
            $room->total_price  = $total_price;
            $room->customer_id  = $customer_id;
            $returnObj          = Utility::addCreated($room);
            // dd($returnObj);
            $returnObj->save();
            DB::commit();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        }catch(\Exception $e) {
            DB::rollBack();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    private static function getCustomerId($name,$email,$phone) {
        $customer       = null;
        $customer       = Customer::select('id')
                        ->where('name',$name)
                        ->where('email',$email)
                        ->where('phone',$phone)
                        ->where('deleted_at')
                        ->first();
                        // dd($customer);
        if($customer == null) {
            $customer           = new Customer;
            $customer->name     = $name;
            $customer->email    = $email;
            $customer->phone    = $phone;
            $returnObj          = Utility::addCreated($customer);
            $returnObj->save();

            $customer_id    = $returnObj->id;
        }else{
            $customer_id    = $customer->id;
        }
        return $customer_id;
        // dd($customer_id);
    }

    public function getReservedRoom() {
        $roomReserve   = Booking::select('id','room_id','customer_id','check_in','check_out','extra_bed','total_price','status')
                        ->orderBy('status','asc')
                        ->orderBy('id','asc')
                        ->whereNull('deleted_at')
                        ->get();
                        // dd($roomReserve);
        return $roomReserve;
    }

    public function reservedAccept($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $bed               = Booking::find($id);
            $bed->status       = Constant::RESERVE_ACCEPT;
            $returnObj         = Utility::addUpdated($bed);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

    public function reservedDecline($id) {
        $returnMessage  = array();
        $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
        try {
            $bed               = Booking::find($id);
            $bed->status       = Constant::RESERVE_DECLINE;
            $returnObj         = Utility::addUpdated($bed);
            $returnObj->save();
            $returnMessage['softGuideStatusCode'] = ReturnMessage::OK;
            return $returnMessage;
        } catch (\Exception $e) {
            $returnMessage['softGuideStatusCode'] = ReturnMessage::INTERNAL_SERVER_ERROR;
            return $returnMessage;
        }
    }

}
