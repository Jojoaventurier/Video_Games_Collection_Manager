<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $operation = $_POST['operation'] ?? null;

    // Add a new game
    if ($operation === 'add_game') {
        $title = $_POST['title'];
        $platform = $_POST['platform'];
        $update_number = $_POST['update_number'];
        $format = $_POST['format'];
        $storage_location = $_POST['storage_location'];

        $stmt = $pdo->prepare("
            INSERT INTO games (title, platform, update_number, format, storage_location) 
            VALUES (:title, :platform, :update_number, :format, :storage_location)
        ");
        $stmt->execute([
            ':title' => $title,
            ':platform' => $platform,
            ':update_number' => $update_number,
            ':format' => $format,
            ':storage_location' => $storage_location,
        ]);
        header('Location: views/game_list.php');
        exit;
    }

    // Edit a game
    if ($operation === 'edit_game') {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $platform = $_POST['platform'];
        $update_number = $_POST['update_number'];
        $format = $_POST['format'];
        $storage_location = $_POST['storage_location'];

        $stmt = $pdo->prepare("
            UPDATE games SET 
                title = :title, platform = :platform, update_number = :update_number, 
                format = :format, storage_location = :storage_location 
            WHERE id = :id
        ");
        $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':platform' => $platform,
            ':update_number' => $update_number,
            ':format' => $format,
            ':storage_location' => $storage_location,
        ]);
        header('Location: views/game_list.php');
        exit;
    }

    // Delete a game
    if ($operation === 'delete_game') {
        $id = $_POST['id'];

        $stmt = $pdo->prepare("DELETE FROM games WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header('Location: views/game_list.php');
        exit;
    }
}