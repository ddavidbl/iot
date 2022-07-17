<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Device;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        return view('public.home');
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
        $returnHTML = view('render.widget', compact('data_result'))->render();

        return response()->json(array(
            'html' => $returnHTML,
        ));
    }

    public function getID($id)
    {
        $area = $id;
        return view('public.detail.show', compact('area'));
    }

    public function device()
    {
        return view('public.device.index');
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
            'volume',
        );

        $returnHTML = view('render.devices', compact('data'))->render();

        return response()->json(array(
            'html' => $returnHTML,
        ));
    }

    public function homepageview()
    {
        return view('public.FrontPage.homepage');
    }

    public function AllData()
    {
        //make a new array to store data

        $data_all = array();

        //get time as the label
        $time = Area::distinct('created_at')->pluck('created_at');

        // Use $time as the parameter to get data and store is to $test_data array and push
        // The Data to the array that have been created from the start;
        foreach ($time as $time_d) {
            //get data with this line of code
            $suhu = Area::distinct('device_id')->where('created_at', $time_d)->pluck('suhu', 'device_id');
            $ph = Area::distinct('device_id')->where('created_at', $time_d)->pluck('ph', 'device_id');
            $do = Area::distinct('device_id')->where('created_at', $time_d)->pluck('DO', 'device_id');
            $ultrasonic = Area::distinct('device_id')->where('created_at', $time_d)->pluck('ultrasonic', 'device_id');
            $kekeruhan = Area::distinct('device_id')->where('created_at', $time_d)->pluck('nilaiKeruh', 'device_id');
            $tds = Area::distinct('device_id')->where('created_at', $time_d)->pluck('TDS', 'device_id');
            $konduktifitas = Area::distinct('device_id')->where('created_at', $time_d)->pluck('konduktifitas', 'device_id');
            //turn data and time as an array
            $suhu_data = array(
                'time' => $time_d,
                'suhu' => $suhu,
                'ph' => $ph,
                'do' => $do,
                'ultrasonic' => $ultrasonic,
                'kekeruhan' => $kekeruhan,
                'tds' => $tds,
                'konduktifitas' => $konduktifitas,
            );
            array_push($data_all, $suhu_data);
        }
        // $test_data_all = json_encode($test_data_all, true);
        return $data_all;
    }
}
