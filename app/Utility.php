<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class Utility {
    public static function addCreated($paraObj) {

        $today_date             = date('Y-m-d H:i:s');
        $paraObj->created_at    = $today_date;
        $paraObj->updated_at    = $today_date;

        if(Auth::guard('Admin')->check()) {
            $user_id                = Auth::guard('Admin')->user()->id;
            $paraObj->created_by    = $user_id;
            $paraObj->updated_by    = $user_id;
        }
        return $paraObj;
    }

    public static function addUpdated($paraObj) {
        $today_date             = date('Y-m-d H:i:s');
        $paraObj->updated_at    = $today_date;

        if(Auth::guard('Admin')->check()) {
            $user_id                = Auth::guard('Admin')->user()->id;
            $paraObj->updated_by    = $user_id;
        }
        return $paraObj;
    }

    public static function addDeleted($paraObj) {
        $today_date             = date('Y-m-d H:i:s');
        $paraObj->deleted_at    = $today_date;
        if(Auth::guard('Admin')->check()) {
            $user_id                = Auth::guard('Admin')->user()->id;
            $paraObj->deleted_by    = $user_id;
        }
        return $paraObj;
    }

    public static function saveDebugLog($logMessage) {
        $log = DB::getQueryLog();
        $formattedLog = '';

        foreach ($log as $entry) {
            $query = $entry['query'];
            $bindings = $entry['bindings'];
            foreach ($bindings as $binding) {
                $query = preg_replace('/\?/', "'$binding'", $query, 1);
            }
            $formattedLog .= $query . PHP_EOL;
        }
        Log::debug(" $logMessage" . PHP_EOL . $formattedLog);
    }
    public static function saveErrorLog($logMessage) {
        $log = DB::getQueryLog();
        $formattedLog = '';

        foreach ($log as $entry) {
            $query = $entry['query'];
            $bindings = $entry['bindings'];

            // Replace the placeholders in the SQL query with actual values.
            foreach ($bindings as $binding) {
                $query = preg_replace('/\?/', "'$binding'", $query, 1);
            }

            $formattedLog .= $query . PHP_EOL;
        }
            Log::error(" $logMessage" . PHP_EOL . $formattedLog);
    }

    public static function cropAndResizeImage($file,$width,$height,$destination,$uniqueName){
        $modifiedImage    = Image::make($file)
                    ->crop($width,$height)
                    ->encode();
        $waterMarkImage     = Image::make(Constant::WATERMARK_PATH);
        $waterMarkX         = $modifiedImage->width() - $waterMarkImage->width() - 10;
        $waterMarkY         = $modifiedImage->height() - $waterMarkImage->height() - 10;
        $modifiedImage->insert($waterMarkImage, 'top-right' ,$waterMarkX,$waterMarkY);
        $modifiedImage->save($destination . '/' . $uniqueName);
    }

};
