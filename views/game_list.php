<?php
require './db_connection.php';

$query = $pdo->query("SELECT * FROM games ORDER BY title ASC");
$games = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold mb-5">Your Game Collection</h2>

    <?php if (empty($games)): ?>
    <tr>
        <td colspan="6" class="text-center py-4">No games found. Add some to your collection!</td>
    </tr>
<?php endif; ?>


    <table class="table-auto w-full overflow-x-auto block md:table">
        <thead>
        <tr class="hover:bg-gray-100">
                <th class="px-4 py-2">Title</th>
                <th class="px-4 py-2">Platform</th>
                <th class="px-4 py-2">Update Number</th>
                <th class="px-4 py-2">Format</th>
                <th class="px-4 py-2">Storage Location</th>
                <th class="px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
            <tr>
                <td class="border px-4 py-2"><?= htmlspecialchars($game['title']); ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($game['platform']); ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($game['update_number']); ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($game['format']); ?></td>
                <td class="border px-4 py-2"><?= htmlspecialchars($game['storage_location']); ?></td>
                <td class="border px-4 py-2">
                    <form method="POST" action="../operations.php" style="display:inline;">
                        <input type="hidden" name="operation" value="delete_game">
                        <input type="hidden" name="id" value="<?= $game['id']; ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    <a href="index.php?page=edit_game&id=<?= $game['id']; ?>" class="btn btn-secondary">Edit</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
