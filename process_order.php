<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login untuk membuat pesanan.");
}

$user_id = $_SESSION['user_id'];
$total_price = $_POST['total_price'];
$status = "Pending";

$stmt = $pdo->prepare("INSERT INTO orders (user_id, total_price, status) VALUES (?, ?, ?)");
$stmt->execute([$user_id, $total_price, $status]);

echo "Pesanan Anda berhasil dibuat.";
?>

