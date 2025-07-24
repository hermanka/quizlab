<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome experts!</title>
    <style>
        body { font-family: Arial; background-color: #f4f4f4; text-align: center; padding: 50px; }
        .container { background: white; padding: 20px; border-radius: 10px; display: inline-block; }
        a.button { background: #007BFF; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to Secure Coding Lab</h1>
        <p>This lab helps you practice secure coding techniques.</p>
        <br>
        <br>
        <?php if (!isset($_SESSION['user'])): ?>
            <a class="button" href="login.php">Login</a>
        <?php else: ?>
            <p>You are logged in as <?php echo htmlspecialchars($_SESSION['user']); ?>.</p>
            <a class="button" href="home.php">Go to Home</a>
        <?php endif; ?>
    </div>
</body>
</html>
