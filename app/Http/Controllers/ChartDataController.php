<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Area;
use Brick\Math\BigInteger;
use DateTime;

class ChartDataController extends Controller
{

    function getTime($id)
    {
        $time_array = array();
        $time = Area::select('created_at', 'id')->where('device_id', $id)->latest()->take(100)->get();
        $time_sort = $time->reverse();
        // $time = Area::where('device', $id)->orderBy('created_at', 'ASC')->pluck('created_at', 'id');
        $time_sort = json_decode($time_sort, true);
        // return $time;

        if (!empty($time_sort)) {
            foreach ($time_sort as $time_data) {
                $time_id = $time_data['id'];
                $date = new DateTime($time_data['created_at']);
                // $timedate = $time_data['created_at'];
                $timedate = $date->format('d-m-y,H:i:s');
                $time_array[$time_id] = $timedate;
            }
        }
        return $time_array;
    }

    function getSensorSuhu($datasensorSuhu)
    {

        $datasensorsuhu = Area::where('id', $datasensorSuhu)->take(1)->orderBy('created_at')->pluck('suhu')->toArray();

        return $datasensorsuhu;
    }

    function getSensorPH($datasensorPH)
    {
        $datasensorph = Area::where('id', $datasensorPH)->take(1)->orderBy('created_at')->pluck('ph')->toArray();
        return $datasensorph;
    }

    function getSensorDO($datasensorDO)
    {
        $datasensordo = Area::where('id', $datasensorDO)->take(1)->orderBy('created_at')->pluck('DO')->toArray();
        return $datasensordo;
    }

    function getSensorUltrasonic($datasensorUltrasonic)
    {
        $datasensorultrasonic = Area::take(1)->where('id', $datasensorUltrasonic)->orderBy('created_at')->pluck('ultrasonic')->toArray();
        return $datasensorultrasonic;
    }

    function getSensorKekeruhan($datasensorKekeruhan)
    {
        $datasensorkekeruhan = Area::take(1)->where('id', $datasensorKekeruhan)->orderBy('created_at')->pluck('nilaiKeruh')->toArray();
        return $datasensorkekeruhan;
    }

    function getsensorTDS($datasensorTDS)
    {
        $datasensortds = Area::take(1)->where('id', $datasensorTDS)->orderBy('created_at')->pluck('TDS')->toArray();
        return $datasensortds;
    }

    function getsensorKonduktifitas($datasensorKonduktifitas)
    {
        $datasensorkonduktifitas = Area::where('id', $datasensorKonduktifitas)->orderBy('created_at')->pluck('konduktifitas')->toArray();
        return $datasensorkonduktifitas;
    }
    //add new function for data

    function POSTDATA($id)
    {

        $time_data_array = array();
        $time_arr = $this->getTime($id);

        $sensor_suhu = array();
        $sensor_ph = array();
        $sensor_do = array();
        $sensor_ultrasonic = array();
        $sensor_kekeruhan = array();
        $sensor_tds = array();
        $sensor_konduktifitas = array();
        // add new array

        if (!empty($time_arr)) {
            foreach ($time_arr as $time_id => $timedate) {
                // $time_data = $this->getSuhuAlat($time_id);
                // $data_kelembapanUdara = $this->getKelembapanUdara($time_id);
                // $data_suhuarea = $this->getsuhuArea($time_id);
                // $data_kelembapantanah = $this->getkelembapanTanah($time_id);
                // $data_curahhujan = $this->getcurahHujan($time_id);
                // $data_arusair = $this->getarusAir($time_id);

                $data_suhu = $this->getSensorSuhu($time_id);
                $data_ph = $this->getSensorPH($time_id);
                $data_do = $this->getSensorDO($time_id);
                $data_ultrasonic = $this->getSensorUltrasonic($time_id);
                $data_kekeruhan = $this->getSensorKekeruhan($time_id);
                $data_tds = $this->getsensorTDS($time_id);
                $data_konduktifias = $this->getsensorKonduktifitas($time_id);
                // call the function to get the data 


                array_push($time_data_array, $timedate);

                array_push($sensor_suhu, $data_suhu);
                $sensorSuhu_array = array_reduce($sensor_suhu, 'array_merge', array());

                array_push($sensor_ph, $data_ph);
                $sensorPH_array = array_reduce($sensor_ph, 'array_merge', array());

                array_push($sensor_do, $data_do);
                $sensorDO_array = array_reduce($sensor_do, 'array_merge', array());

                array_push($sensor_ultrasonic, $data_ultrasonic);
                $sensorUltrasonic_array = array_reduce($sensor_ultrasonic, 'array_merge', array());

                array_push($sensor_kekeruhan, $data_kekeruhan);
                $sensorKekeruhan_array = array_reduce($sensor_kekeruhan, 'array_merge', array());

                array_push($sensor_tds, $data_tds);
                $sensorTDS_array = array_reduce($sensor_tds, 'array_merge', array());

                array_push($sensor_konduktifitas, $data_konduktifias);
                $sensorKonduktifitas_array = array_reduce($sensor_konduktifitas, 'array_merge', array());


                // array_push($suhu_alat, $time_data);
                // $suhuAlat_array = array_reduce($suhu_alat, 'array_merge', array());

                // array_push($kelembapan_udara, $data_kelembapanUdara);
                // $kelembapanUdara_array = array_reduce($kelembapan_udara, 'array_merge', array());

                // array_push($suhu_area, $data_suhuarea);
                // $suhuarea_array = array_reduce($suhu_area, 'array_merge', array());

                // array_push($kelembapan_tanah, $data_kelembapantanah);
                // $kelembapantanah_array = array_reduce($kelembapan_tanah, 'array_merge', array());

                // array_push($curah_hujan, $data_curahhujan);
                // $curahhujan_array = array_reduce($curah_hujan, 'array_merge', array());

                // array_push($arus_air, $data_arusair);
                // $arusair_array = array_reduce($arus_air, 'array_merge', array());
                //push data into array
            }
        }
        // return $time_data_array;
        // return $data_array;
        // return $data_arr;

        $post_time_data_array = array(
            'time' => $time_data_array,
            'suhu' => $sensorSuhu_array,
            'ph' => $sensorPH_array,
            'do' => $sensorDO_array,
            'ultrasonic' => $sensorUltrasonic_array,
            'kekeruhan' => $sensorKekeruhan_array,
            'tds' => $sensorTDS_array,
            'konduktifitas' => $sensorKonduktifitas_array
            // 'suhuAlat' => $suhuAlat_array,
            // 'kelembapanUdara' => $kelembapanUdara_array,
            // 'suhuArea' => $suhuarea_array,
            // 'kelembapanTanah' => $kelembapantanah_array,
            // 'curahHujan' => $curahhujan_array,
            // 'arusAir' => $arusair_array,
            // call the array here
        );

        return $post_time_data_array;


        // return $post_time_data_array;
    }
}
