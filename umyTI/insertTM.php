<?php
include_once "koneks.php";

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$nama   = trim($data['nama'] ?? '');
$alamat = trim($data['alamat'] ?? '');
$telpon = trim($data['telpon'] ?? '');

if ($nama === '' || $alamat === '' || $telpon === '') {
    http_response_code(400);

    echo json_encode([
        'error' => 'Data tidak boleh kosong'
    ]);

    exit;
}

try {
    $query = mysqli_prepare(
        $conn,
        "INSERT INTO siswa (nama, alamat, telpon)
        VALUES (?, ?, ?)"
    );

    mysqli_stmt_bind_param(
        $query,
        "sss",
        $nama,
        $alamat,
        $telpon
    );

    mysqli_stmt_execute($query);

    if (mysqli_stmt_affected_rows($query) > 0) {
        http_response_code(201);

        echo json_encode([
            'message' => 'Data berhasil ditambahkan'
        ]);
    } else {
        http_response_code(500);

        echo json_encode([
            'error' => 'Data gagal ditambahkan'
        ]);
    }

    mysqli_stmt_close($query);

} catch (mysqli_sql_exception $e) {
    http_response_code(500);

    echo json_encode([
        'error' => 'Gagal menyimpan data siswa'
    ]);
}

mysqli_close($conn);