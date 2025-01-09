<?php
// Database connection
$dsn = 'mysql:host=localhost;dbname=game_collection;charset=utf8mb4';
$username = 'root';
$password = ''; // Update this based on your setup

try {
    $pdo = new PDO($dsn, $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['csv_file'])) {
    $file = $_FILES['csv_file']['tmp_name'];

    if (($handle = fopen($file, 'r')) !== false) {
        // Skip the header row (if present)
        fgetcsv($handle);

        $insertQuery = $pdo->prepare(
            "INSERT INTO games (title, platform, update_number, format, is_physical, created_at, updated_at) 
             VALUES (:title, :platform, :update_number, :format, :is_physical, NOW(), NOW())"
        );

        $addedCount = 0;

        while (($data = fgetcsv($handle, 1000, ',')) !== false) {
            [$title, $platform, $updateNumber, $fileName] = $data;

            // Categorize based on file extension or name
            $format = null;
            $isPhysical = false;

            if (preg_match('/\.iso$/i', $fileName)) {
                $format = 'ISO';
            } elseif (preg_match('/portable/i', $fileName)) {
                $format = 'Portable';
            } elseif (preg_match('/repack/i', $fileName)) {
                $format = 'Repack';
            }

            // If no filename provided, assume physical
            if (empty($fileName)) {
                $isPhysical = true;
            }

            // Insert into database
            $insertQuery->execute([
                ':title' => $title,
                ':platform' => $platform,
                ':update_number' => $updateNumber,
                ':format' => $format,
                ':is_physical' => $isPhysical,
            ]);

            $addedCount++;
        }

        fclose($handle);

        echo "Successfully added $addedCount games to the database.";
    } else {
        echo "Failed to open the file.";
    }
}
?>