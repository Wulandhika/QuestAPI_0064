<?php
include_once "koneks.php";

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

try {
    $result = mysqli_query(
        $conn,
        "SELECT * FROM siswa ORDER BY nama"
    );

    $json = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $row['id'] = (int) $row['id'];
        $json[] = $row;
    }

    echo json_encode($json);

} catch (mysqli_sql_exception $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Gagal mengambil data siswa']);
}

mysqli_close($conn);