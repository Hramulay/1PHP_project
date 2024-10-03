<?php
include_once '../config/database.php';
include_once '../models/User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['register'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirm = $_POST['password_confirm'];

        $result = $user->register($name, $email, $password, $password_confirm);

        if ($result === true) {
            header("Location: login.php");
        } else {
            echo $result;
        }
    }

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $user_data = $user->login($email, $password);

        if ($user_data) {
            $_SESSION['user_id'] = $user_data['id'];
            $_SESSION['user_name'] = $user_data['name'];
            header("Location: messages.php");
        } else {
            echo "Invalid credentials.";
        }
    }
}
?>
