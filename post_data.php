<?php
/*
  Rui Santos
  Complete project details at https://RandomNerdTutorials.com
  
  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files.
  
  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.
*/

$servername = "127.0.0.1:3306";

// REPLACE with your Database name
$dbname = "iot";
// REPLACE with Database user
$username = "root";
// REPLACE with Database user password
$password = "";

// Keep this API Key value to be compatible with the ESP32 code provided in the project page. If you change this value, the ESP32 sketch needs to match
//$api_key_value = "tPmAT5Ab3j7F9";

//$api_key = $value1 = $value2 = $value3 = "";

//if ($_SERVER["REQUEST_METHOD"] == "POST") {
//    $api_key = test_input($_POST["api_key"]);
//    if($api_key == $api_key_value) {
//$value1 = test_input($_POST["value1"]);
//$value2 = test_input($_POST["value2"]);
//$value3 = test_input($_POST["value3"]);
//http://localhost/IOT_umi/post_data.php?tegangan_1=10&tegangan_2=12&tegangan_3=13&arus_1=10&arus_2=10&arus_3=10
// $tegangan_1 = $_GET['tegangan_1'];
// $tegangan_2 = $_GET['tegangan_2'];
// $tegangan_3 = $_GET['tegangan_3'];
// $arus_1 = $_GET['arus_1'];
// $arus_2 = $_GET['arus_2'];
// $arus_3 = $_GET['arus_3'];
// $daya_1 = $tegangan_1 * $arus_1;
// $daya_2 = $tegangan_2 * $arus_2;
// $daya_3 = $tegangan_3 * $arus_3;
$suhu = $_GET['suhu'];
$ph = $_GET['ph'];
$do = $_GET['DO'];
$ultrasonic = $_GET['ultrasonic'];
$nilaiKeruh = $_GET['nilaiKeruh'];
$tds = $_GET['TDS'];
$konduktifitas = $_GET['konduktifitas'];
// $suhu_alat = $_GET['suhu_alat'];
//$value1 = 3;
//$value2 = 4;
//$value3 = 5;
//echo $value1;
//echo $value2;
//echo $value3, "<br>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($conn != false) {
    echo "Status : Berhasil Terhubung<br>";
} else {
    echo "Status : Gagal Terhubung<br>";
}


$sql = "INSERT INTO areas (suhu,ph,DO,ultrasonic,nilaiKeruh,TDS,konduktifitas)
        VALUES ('" . $suhu . "','" . $ph . "','" . $do . "','" . $ultrasonic . "','" . $nilaiKeruh . "','" . $tds . "','" . $konduktifitas . "')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
//}
//    else {
//        echo "Wrong API Key provided.";
//    }

//}
//else {
//    echo "No data posted with HTTP POST.";
//}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
