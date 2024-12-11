<?php
include 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Anda harus login untuk menambah produk ke wishlist.");
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$stmt = $pdo->prepare("INSERT INTO wishlist (user_id, product_id) VALUES (?, ?)");
$stmt->execute([$user_id, $product_id]);

echo "Produk berhasil ditambahkan ke wishlist.";
?>

