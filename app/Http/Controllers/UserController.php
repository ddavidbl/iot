<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    public function volumeValue($id)
    {
        $device = Device::find($id);
        $ultrasonic = Area::select('ultrasonic')->where('device_id', $id)->orderBy('created_at', 'DESC')->first();
        if ($device) {
            return response()->json([
                'status' => 200,
                'ultrasonic' => $ultrasonic,
                'device' => $device,
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something Went Wrong',
            ]);
        }
    }

    public function updateVolume(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'panjang' => 'numeric',
            'lebar' => 'numeric',
            'volume' => 'numeric',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors(),
            ]);
        } else {
            $device = Device::find($id);
            if ($device) {
                $device->panjang = $request->input('panjang');
                $device->lebar = $request->input('lebar');
                $device->volume = $request->input('volume');
                $device->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Volume Device'
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Device Not Found'
                ]);
            }
        }
    }
}
