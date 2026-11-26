<?php
$server   = "127.0.0.1";
$user     = "root";
$password = "";
$namadb   = "tiumy";
$port     = 3307;

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    $conn = mysqli_connect(
        $server,
        $user,
        $password,
        $namadb,
        $port
    );

    mysqli_set_charset($conn, "utf8mb4");

} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    header('Content-Type: application/json');
    echo json_encode(['error' => 'Koneksi database gagal']);
    exit;
}