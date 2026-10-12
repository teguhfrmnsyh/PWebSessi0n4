<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "pemograman_web_sesi_4";

$conn = new mysqli(
    $host,
    $user,
    $password,
    $database
);

if ($conn->connect_error) {
    die("Koneksi database gagal: " . $conn->connect_error);
}

?>