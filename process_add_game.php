<?php
require 'db_connection.php';

$title = $_POST['title'];
$platform = $_POST['platform'];
$update_number = $_POST['update_number'] ?: null;
$format = $_POST['format'] ?: null;
$digital_storage = $_POST['digital_storage'] ?: null;
$is_physical = isset($_POST['is_physical']) ? 1 : 0;

$query = $pdo->prepare(
    "INSERT INTO games (title, platform, update_number, format, is_physical, digital_storage, created_at, updated_at) 
     VALUES (:title, :platform, :update_number, :format, :is_physical, :digital_storage, NOW(), NOW())"
);

$query->execute([
    ':title' => $title,
    ':platform' => $platform,
    ':update_number' => $update_number,
    ':format' => $format,
    ':is_physical' => $is_physical,
    ':digital_storage' => $digital_storage,
]);

header('Location: index.php');