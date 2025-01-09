<?php
// Database connection
$dsn = 'mysql:host=localhost;dbname=game_collection;charset=utf8mb4';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Fetch all games
$query = $pdo->query("SELECT * FROM games ORDER BY created_at DESC");
$games = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Game Collection</title>
</head>
<body>
    <h1>My Game Collection</h1>
    <a href="upload_form.php">Upload Games via CSV</a> | <a href="add_game.php">Add a Game</a>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Title</th>
                <th>Platform</th>
                <th>Update Number</th>
                <th>Format</th>
                <th>Physical</th>
                <th>Added On</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
                <tr>
                    <td><?= htmlspecialchars($game['title']) ?></td>
                    <td><?= htmlspecialchars($game['platform']) ?></td>
                    <td><?= htmlspecialchars($game['update_number']) ?></td>
                    <td><?= htmlspecialchars($game['format']) ?></td>
                    <td><?= $game['is_physical'] ? 'Yes' : 'No' ?></td>
                    <td><?= htmlspecialchars($game['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>