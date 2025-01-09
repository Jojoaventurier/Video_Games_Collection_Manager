<?php
// Include database connection
require 'db_connection.php';

// Determine which page to load (default: home)
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Define the allowed pages
$allowed_pages = ['home', 'add_game', 'game_list'];

// Sanitize and validate the page
if (!in_array($page, $allowed_pages)) {
    $page = 'home'; // Default to home if the page is invalid
}

// Include the selected page
ob_start(); // Start output buffering
include "views/{$page}.php";
$content = ob_get_clean(); // Get the page content
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/tailwind.css" rel="stylesheet">
    <title>Game Collection</title>
</head>
<body class="bg-gray-100">
    <?php include 'partials/header.php'; ?>

    <div class="container mx-auto p-6">
        <?= $content; // Display the selected page's content ?>
    </div>

    <?php include 'partials/footer.php'; ?>
</body>
</html>