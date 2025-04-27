<?php
// Koneksi ke database RDS
$host = 'ecommerce-db.cvqmay4ue74t.ap-southeast-1.rds.amazonaws.com'; // Ganti dengan endpoint RDS kamu
$db = 'ecommerce';
$user = 'admin';
$pass = 'babayaga69';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM products");

    echo "<h1>Daftar Produk</h1>";
    while ($row = $stmt->fetch()) {
        echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
        echo "<img src='" . htmlspecialchars($row['image_url']) . "' width='200' /><br>";
        echo "<p>Harga: Rp" . number_format($row['price'], 0, ',', '.') . "</p><hr>";
    }
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
}
?>