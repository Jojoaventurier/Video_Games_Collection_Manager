<?php
require './db_connection.php';

if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM games WHERE id = :id");
    $stmt->execute([':id' => $_GET['id']]);
    $game = $stmt->fetch();
}
?>
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold">Edit Game</h2>
    <form method="POST" action="../operations.php" class="space-y-4">
        <input type="hidden" name="operation" value="edit_game">
        <input type="hidden" name="id" value="<?= htmlspecialchars($game['id']); ?>">
        <input type="text" name="title" value="<?= htmlspecialchars($game['title']); ?>" class="input input-bordered w-full" required />
        <input type="text" name="platform" value="<?= htmlspecialchars($game['platform']); ?>" class="input input-bordered w-full" required />
        <input type="number" name="update_number" value="<?= htmlspecialchars($game['update_number']); ?>" class="input input-bordered w-full" />
        <select name="format" class="select select-bordered w-full">
            <option value="">Select Format</option>
            <option value="portable" <?= $game['format'] === 'portable' ? 'selected' : ''; ?>>Portable</option>
            <option value="iso" <?= $game['format'] === 'iso' ? 'selected' : ''; ?>>ISO</option>
            <option value="repack" <?= $game['format'] === 'repack' ? 'selected' : ''; ?>>Repack</option>
        </select>
        <input type="text" name="storage_location" value="<?= htmlspecialchars($game['storage_location']); ?>" class="input input-bordered w-full" />
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>
</div>