<?php

namespace App\Helpers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use function PHPUnit\Framework\isEmpty;

class SiteHelper
{
    public static function reformatDbDateTime($datetimeStr)
    {

        if (!empty($datetimeStr)) {
            return Carbon::createFromFormat('d, M Y H:i', $datetimeStr)->format('Y-m-d H:i:s');
        } else {
            return NULL;
        }
    }

    public static function reformatDbDate($dateStr)
    {
        if (!empty($dateStr)) {
            return Carbon::createFromFormat('d, M Y H:i:s', "{$dateStr} 00:00:00")->format('Y-m-d');
        } else {
            return NULL;
        }
    }


    public static function reformatDbTime($timeStr)
    {
        if (!empty($timeStr)) {
            return Carbon::createFromFormat('h:i A', $timeStr)->format('H:i');
        } else {
            return NULL;
        }
    }

    public static function reformatReadableTime($datetimeStr)
    {

        if (!empty($datetimeStr)) {
            return Carbon::createFromFormat('H:i:s', $datetimeStr)->format('h:i A');
        } else {
            return NULL;
        }
    }

    public static function reformatReadableDateTime($datetimeStr)
    {

        if (!empty($datetimeStr)) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $datetimeStr)->format('m/d/Y H:i');
        } else {
            return NULL;
        }
    }

    public static function reformatReadableDate($dateStr)
    {
        if (!empty($dateStr)) {
            return Carbon::createFromFormat('Y-m-d H:i:s', "{$dateStr} 00:00:00")->format('d-M-Y');
        } else {
            return NULL;
        }
    }

    static public function isActive($val)
    {
        if ($val == 1) {
            return "Yes";
        }
        return "No";
    }

    static public function removeSpecialCharacter($val)
    {
        // Define the regular expression pattern to match single quotes and double quotes
        $pattern = '/[\'"]+/';

        // Use preg_replace() to remove single quotes and double quotes from the string
        $cleanedString = preg_replace($pattern, '', $val);

        return $cleanedString;
    }


    public static function weekEndDateReadable($dateStr)
    {
        $c_init_date = Carbon::createFromFormat('Y-m-d', $dateStr);
        return $c_init_date->addDays(6)->format("m/d/Y");
    }

    public static function getLoggedInCustomerId()
    {
        return Customer::firstWhere('user_id', session()->get('User')->id)->id;
    }

    public static function getLoggedInUserId()
    {
        return session()->get('User')->id;
    }

    public static function getLoggedInRole()
    {
        return session()->get('Role')->code;
    }

    public static function do_upload_image($request, $column_name, $ModelObject, $folder_name)
    {
        //delete previous image if has any
        if (!empty($ModelObject[$column_name])) {
            File::delete("public/uploads/" . $folder_name . '/' . $ModelObject[$column_name]);
        }

        if (!empty($request[$column_name])) {
            $image_base64 = $request[$column_name];
            $folderPath = "public/uploads/" . $folder_name . '/'; //path location
            $image_parts = explode(";base64,", $image_base64);
            $image_type_aux = explode("image/", $image_parts[0]);
            $extension = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $fileName = uniqid() . "_" . $ModelObject->id;
            $file = $folderPath . $fileName . '.' . $extension;
            file_put_contents($file, $image_base64);
            $image = $fileName . '.' . $extension;
            return $image;
        } else {
            return '';
        }
    }


}
