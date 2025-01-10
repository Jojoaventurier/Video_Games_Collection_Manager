
<div class="container mx-auto mt-10">
    <h2 class="text-2xl font-bold">Add a New Game</h2>
    <form method="POST" action="./operations.php" class="space-y-4">
        <input type="hidden" name="operation" value="add_game">
        <input type="text" name="title" placeholder="Game Title" class="input input-bordered w-full" required />
        <input type="text" name="platform" placeholder="Platform (e.g., Epic, GOG)" class="input input-bordered w-full" required />
        <input type="text" name="update_number" placeholder="Update Number" class="input input-bordered w-full" />
        <select name="format" class="select select-bordered w-full">
            <option value="">Select Format</option>
            <option value="portable">Portable</option>
            <option value="iso">ISO</option>
            <option value="repack">Repack</option>
        </select>
        <input type="text" name="storage_location" placeholder="Storage Location (e.g., HDD, SSD, Console)" class="input input-bordered w-full" />
        <button type="submit" class="btn btn-primary">Add Game</button>
    </form>
</div>
