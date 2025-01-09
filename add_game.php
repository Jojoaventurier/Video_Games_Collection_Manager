<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    // Insert game
    $query = $pdo->prepare(
        "INSERT INTO games (title, platform, update_number, format, is_physical, created_at, updated_at) 
         VALUES (:title, :platform, :update_number, :format, :is_physical, NOW(), NOW())"
    );
    $query->execute([
        ':title' => $_POST['title'],
        ':platform' => $_POST['platform'],
        ':update_number' => $_POST['update_number'],
        ':format' => $_POST['format'] ?: null,
        ':is_physical' => isset($_POST['is_physical']),
    ]);

    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a Game</title>
</head>
<body>
    <h1>Add a Game</h1>
    <form method="post">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Platform: <input type="text" name="platform" required></label><br>
        <label>Update Number: <input type="text" name="update_number"></label><br>
        <label>Format: 
            <select name="format">
                <option value="">-- Select Format --</option>
                <option value="Portable">Portable</option>
                <option value="ISO">ISO</option>
                <option value="Repack">Repack</option>
            </select>
        </label><br>
        <label>Physical Copy: <input type="checkbox" name="is_physical"></label><br>
        <button type="submit">Add Game</button>
    </form>
</body>
</html>