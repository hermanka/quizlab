<?php
$conn = new mysqli("db", "student", "student", "quiz");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
