<?php $view = 'views/register.php'; include 'layout.php'; ?>

<form action="controllers/AuthController.php" method="POST">
    <h2>Register</h2>
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <label for="password_confirm">Confirm Password:</label>
    <input type="password" name="password_confirm" required>
    <button type="submit" name="register">Register</button>
</form>
