<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
include('config.php');

$product_id = $_GET['id'];
$produk = $conn->query("SELECT * FROM products WHERE id = $product_id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_SESSION['user'];
    $komentar = $_POST['comment'];
    $insert = $conn->query("INSERT INTO comments (product_id, username, comment) VALUES ($product_id, '$user', '$komentar')");
        if ($insert) {
            $message = "Komentar berhasil ditambahkan.";
        } else {
            $message = "Gagal menambahkan komentar: " . mysqli_error($conn);
        }
}

$comments = $conn->query("SELECT * FROM comments WHERE product_id = $product_id");
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($produk['name']) ?></title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        h2, h3 {
            color: #333;
        }
        p {
            line-height: 1.6;
        }
        form textarea {
            width: 100%;
            height: 80px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        form button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 10px;
        }
        form button:hover {
            background-color: #0056b3;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            background: #f9f9f9;
            margin-bottom: 10px;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
        }
        .comment-header {
            font-weight: bold;
            margin-bottom: 4px;
        }
        .delete-link {
            float: right;
            color: red;
            text-decoration: none;
            font-size: 0.9em;
        }
        .delete-link:hover {
            text-decoration: underline;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #007bff;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2><?= htmlspecialchars($produk['name']) ?></h2>
    <p><?= htmlspecialchars($produk['description']) ?></p>
    
    <h3>Berikan komentar :</h3>
    <form method="POST">
        <textarea name="comment" required></textarea><br>
        <button type="submit">Submit</button>
    </form>

    <h3>Komentar</h3>
    <?php if ($message): ?>
        <div class="message <?= strpos($message, 'Gagal') !== false ? 'error' : '' ?>">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
    <ul>
    <?php if ($comments && $comments->num_rows > 0): ?>
        <?php while ($c = $comments->fetch_assoc()): ?>
            <li>
                <div class="comment-header">
                    <?= htmlspecialchars($c['username']) ?>
                    <a class="delete-link" href="delete_comment.php?id=<?= $c['id'] ?>&product_id=<?= $product_id ?>">Delete</a>
                </div>
                <div><?= $c['comment'] ?></div>
            </li>
        <?php endwhile; ?>
    <?php else: ?>
        <li><em>Belum ada komentar untuk produk ini.</em></li>
    <?php endif; ?>
    </ul>


    <a class="back-link" href="home.php">&larr; Kembali ke daftar produk</a>
</div>
</body>
</html>
