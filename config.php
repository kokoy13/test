<?php

require 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host_ip = $_ENV['HOST_IP'];
$db_user = $_ENV['DB_USER'];
$db_pass = $_ENV['DB_PASS'];
$db_name = $_ENV['DB_NAME'];
$table_name = $_ENV['TABLE_NAME'];

$con = new mysqli($host_ip, $db_user, $db_pass, $db_name);

// Cek error koneksi
if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
} 

//mysqli_report(MYSQLI_REPORT_OFF);
