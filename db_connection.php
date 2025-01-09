<?php
// db_connection.php

// Database configuration
$host = '127.0.0.1';
$dbname = 'video_game_collection'; // Replace with your database name
$username = 'root'; // Replace with your database username
$password = ''; // Replace with your database password
$port = 3306; // Default MySQL port

try {
    // Create a PDO instance
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Handle connection error
    die("Database connection failed: " . $e->getMessage());
}