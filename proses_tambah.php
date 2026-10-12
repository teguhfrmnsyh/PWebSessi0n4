<?php

require "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: form_mahasiswa.php");
    exit;
}

$nim = trim($_POST["nim"] ?? "");
$nama = trim($_POST["nama"] ?? "");
$program_studi = trim($_POST["program_studi"] ?? "");
$email = trim($_POST["email"] ?? "");
$nomor_telepon = trim($_POST["nomor_telepon"] ?? "");

if (
    $nim === "" ||
    $nama === "" ||
    $program_studi === "" ||
    $email === "" ||
    $nomor_telepon === ""
) {
    die("Semua field wajib diisi.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: form_mahasiswa.php?status=email_tidak_valid");
    exit;
}

$stmt = $conn->prepare(
    "INSERT INTO mahasiswa
    (nim, nama, program_studi, email, nomor_telepon)
    VALUES (?, ?, ?, ?, ?)"
);

$stmt->bind_param(
    "sssss",
    $nim,
    $nama,
    $program_studi,
    $email,
    $nomor_telepon
);

$berhasil = false;
$kode_error = 0;

try {
    $berhasil = $stmt->execute();
    $kode_error = $stmt->errno;
} catch (mysqli_sql_exception $e) {
    $kode_error = $e->getCode();
}

if (!$berhasil) {
    $stmt->close();
    $conn->close();

    if ($kode_error === 1062) {
        header("Location: form_mahasiswa.php?status=duplikat");
        exit;
    }

    die("Gagal menyimpan data.");
}

$stmt->close();
$conn->close();

header("Location: data_mahasiswa.php?status=sukses");
exit;

?>