<?php
include('config.php');
$id = $_GET['id'];
$product_id = $_GET['product_id'];
$conn->query("DELETE FROM comments WHERE id = $id");
header("Location: product.php?id=$product_id");
exit;
