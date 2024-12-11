<?php
include '../db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];
    $target_dir = "../assets/images/";
    $target_file = $target_dir . basename($image);

    // Upload file gambar
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $image]);
        echo "Produk berhasil ditambahkan.";
    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>

