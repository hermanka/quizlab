<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
include('config.php');
$products = $conn->query("SELECT * FROM products");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home - Product Board</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .logout {
            float: right;
            margin-top: -40px;
        }
        .product-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 250px;
            padding: 15px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .card img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .card h3 {
            margin: 10px 0;
        }
        .card a {
            display: inline-block;
            padding: 8px 12px;
            background-color: #007BFF;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .card a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
    <a class="logout" href="logout.php">Logout</a>

    <div class="product-grid">
        <?php while ($p = $products->fetch_assoc()): ?>
            <div class="card">
                <img src="https://placehold.co/250x150?text=<?= urlencode($p['name']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
                <h3><?= htmlspecialchars($p['name']) ?></h3>
                <a href="product.php?id=<?= $p['id'] ?>">Lihat Detail</a>
            </div>
        <?php endwhile; ?>
    </div>
    </div>
</body>
</html>
