<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Validator;
use App\Models\Area;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{

    public function admin()
    {
        return view('Admin.FrontPage.homepage');
    }

    public function adminHome()
    {
        return view('Admin.home');
    }

    public function deviceIndex()
    {
        return view('Admin.device.index');
    }

    public function getID($id)
    {
        $area = $id;
        return view('Admin.detail.show', compact('area'));
    }

    public function getLatestData()
    {
        $deviceID = Device::has('areas')->pluck('id');

        $data_array = array();

        foreach ($deviceID as $device) {
            $datasensor = Area::select(
                'device_id',
                'suhu',
                'ph',
                'DO',
                'ultrasonic',
                'nilaiKeruh',
                'TDS',
                'konduktifitas',
                'panjang',
                'lebar',
                'volume',

            )
                ->where('device_id', $device)
                ->orderBy('created_at', 'DESC')->first()->toArray();

            array_push($data_array, $datasensor);
        }
        // 
        $data_result = $data_array;
        // return $data_result;
        $returnHTML = view('Admin.device', compact('data_result'))->render();

        return response()->json(array(
            'html' => $returnHTML,
        ));
    }

    public function renderDevices()
    {
        $data = Device::all(
            'id',
            'lat',
            'lng',
            'lokasi',
            'panjang',
            'lebar',
            'volume'
        );

        $device_array = $data;
        $returnHTML = view('Admin.device.devices', compact('device_array'))->render();

        return response()->json(array(
            'html' => $returnHTML,
        ));
    }

    public function storeDevice(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
            'lokasi' => 'required'
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors(),
            ]);
        } else {
            $device = new Device;
            $device->lat = $request->input('lat');
            $device->lng = $request->input('lng');
            $device->lokasi = $request->input('lokasi');
            $device->save();
            return response()->json([
                'status' => 200,
                'message' => 'Device Added Succesfully'
            ]);
        }
    }

    public function editDevice($id)
    {
        $device = Device::find($id);
        if ($device) {
            return response()->json([
                'status' => 200,
                'device' => $device,
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something Went Wrong',
            ]);
        }
    }

    public function updateDevice(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'lat' => 'required',
            'lng' => 'required',
            'lokasi' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors(),
            ]);
        } else {
            $device = Device::find($id);
            if ($device) {
                $device->lat = $request->input('lat');
                $device->lng = $request->input('lng');
                $device->lokasi = $request->input('lokasi');
                $device->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'Device',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Device Not Found',
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $delete_area = Area::where('device_id', $id)->delete();
        $delete = Device::find($id)->delete();
        $delete_area;
        $delete;

        return response()->json([
            'status' => 200,
        ]);
    }

    public function renderUser()
    {
        $users = User::all();
        $user_array = $users;
        $renderUser = view('Admin.users.index', compact('user_array'))->render();


        return response()->json(array(
            'html' => $renderUser,
        ));
    }

    public function userIndex()
    {
        $roles = Role::all();
        return view('Admin.users.show', compact('roles'));
    }

    public function storeUser(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'password' => 'required|min:6',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors(),
            ]);
        } else {
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->role = $request->input('role');
            $user->password = $request->input('password');
            $user->save();
            return response()->json([
                'status' => 200,
                'message' => 'User Added Successfully'
            ]);
        }
    }

    public function editUser($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json([
                'status' => 200,
                'user' => $user,
            ]);
        } else {
            return response()->json([
                'status' => 500,
                'message' => 'Something Went Wrong The ID is not exist in database',
            ]);
        }
    }

    public function updateUser(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validate->errors(),
            ]);
        } else {
            $user = User::find($id);
            if ($user) {
                $user->name = $request->input('name');
                $user->email = $request->input('email');
                $user->role = $request->input('role');
                $user->update();
                return response()->json([
                    'status' => 200,
                    'message' => 'User',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'User Not Found',
                ]);
            }
        }
    }

    public function destroyUser($id)
    {
        $delete_user = User::find($id)->delete();
        $delete_user;
        return response()->json([
            'status' => 200,
        ]);
    }

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
