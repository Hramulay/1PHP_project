<?php $view = 'views/login.php'; include 'layout.php'; ?>

<form action="controllers/AuthController.php" method="POST">
    <h2>Login</h2>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <button type="submit" name="login">Login</button>
</form>
