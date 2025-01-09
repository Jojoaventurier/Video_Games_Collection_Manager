<?php
require 'db_connection.php';

// Example: Fetch all games
$query = $pdo->query("SELECT * FROM games");
$games = $query->fetchAll(PDO::FETCH_ASSOC);

foreach ($games as $game) {
    echo $game['title'] . '<br>';
}
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
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">My Game Collection</h1>
        <table class="table-auto w-full mt-6 border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Platform</th>
                    <th class="border px-4 py-2">Update Number</th>
                    <th class="border px-4 py-2">Format</th>
                    <th class="border px-4 py-2">Digital Storage</th>
                    <th class="border px-4 py-2">Physical</th>
                    <th class="border px-4 py-2">Added On</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($games as $game): 
                ?>

                    <tr class="hover:bg-gray-100">
                        <td class="border px-4 py-2"><?= htmlspecialchars($game['title']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($game['platform']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($game['update_number']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($game['format']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($game['digital_storage']) ?></td>
                        <td class="border px-4 py-2"><?= $game['is_physical'] ? 'Yes' : 'No' ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($game['created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>