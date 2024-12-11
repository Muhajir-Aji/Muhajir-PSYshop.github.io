<?php
// Mengecek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data username dan password dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Kredensial yang benar
    $valid_username = "Muhajir";
    $valid_password = "1234567";

    // Verifikasi username dan password
    if ($username === $valid_username && $password === $valid_password) {
        // Set session untuk login
        session_start();
        $_SESSION['username'] = $username;

        // Redirect ke halaman utama setelah login berhasil
        header("Location: index.html"); // Atau halaman lain yang Anda inginkan
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error
        echo "<script>alert('Username atau password salah!'); window.location.href='login.html';</script>";
    }
}
?>

