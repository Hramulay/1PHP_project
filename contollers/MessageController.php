<?php
include_once '../config/database.php';
include_once '../models/Message.php';

$database = new Database();
$db = $database->getConnection();
$message = new Message($db);

// Отправка сообщения
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])) {
    $text = $_POST['text'];
    $user_id = $_SESSION['user_id'];
    $image = null;

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = '../assets/uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $image);
    }

    $message->send($text, $user_id, $image);
    header("Location: messages.php");
}

// Получение последних 20 сообщений
$messages = $message->getLastMessages();
?>
