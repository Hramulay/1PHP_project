<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/styles.css">
    <title>Blog</title>
</head>
<body>
    <header>
        <h1>My Blog</h1>
        <?php if (isset($_SESSION['user_id'])): ?>
            <p>Welcome, <?= $_SESSION['user_name'] ?>!</p>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </header>

    <main>
        <?php include($view); ?>
    </main>

    <footer>
        <p>&copy; <?= date('Y') ?> My Blog</p>
    </footer>
</body>
</html>
