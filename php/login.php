<?php
session_start();
include('config.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);
    if ($result && $result->num_rows > 0) {
        $_SESSION['user'] = $user;
        header("Location: home.php");
        exit();
    } else {
        $error = "Login failed!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { font-family: Arial; background: #f4f4f4; text-align: center; padding: 50px; }
        .form-box { background: white; padding: 20px; border-radius: 10px; display: inline-block; }
        input { padding: 10px; margin: 5px; width: 200px; }
        button { padding: 10px 20px; background: #007BFF; color: white; border: none; border-radius: 5px; }
    </style>
</head>
<body>
    <div class="form-box">
        <h2>Login</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <input type="text" name="user" placeholder="Username" required><br>
            <input type="password" name="pass" placeholder="Password" required><br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
