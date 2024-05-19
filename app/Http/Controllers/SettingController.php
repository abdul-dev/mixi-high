<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    public function updateSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'thumbnail' => 'nullable|file|max:2048', // 2048 kilobytes = 2 megabytes
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => FALSE,
                'message' => $validator->errors()->first()
            ]);
        }

        $requestArray = $request->except(['thumbnail_remove', 'business_thumbnail']);
        if (!empty($requestArray)) {
            foreach ($requestArray as $key => $value) {
                Setting::updateOrCreate(['key' => $key], ['value' => $value]);
            }
        }

        $thumbnail = $request->file('business_thumbnail');
        if (!empty($thumbnail)) {
            $business_thumbnail_record = Setting::where('key', 'business_thumbnail')->first();
            $business_thumbnail = $business_thumbnail_record ? $business_thumbnail_record->value : "";
            if ($business_thumbnail && File::exists(public_path('uploads/users/' . $business_thumbnail))) {
                unlink(public_path('uploads/company/images/' . $business_thumbnail));
            }

            $file_name = "thumbnail-" . time();
            $type = $thumbnail->getClientOriginalExtension();
            $image_name = $file_name . '.' . $type;
            $thumbnail->move(public_path('uploads/company/images'), $image_name);
            Setting::updateOrCreate(
                ['key' => 'business_thumbnail'],
                ['value' => $image_name]
            );
        }

        return response()->json([
            "status" => true,
            "message" => "Updated Successfully"
        ]);
    }
}
