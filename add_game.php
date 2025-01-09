<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/tailwind.css" rel="stylesheet">
    <title>Add a Game</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Add a Game</h1>
        <form action="process_add_game.php" method="post" class="space-y-4 bg-white p-6 rounded shadow">
            <div>
                <label class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Platform</label>
                <input type="text" name="platform" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Update Number</label>
                <input type="text" name="update_number" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Format</label>
                <select name="format" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                    <option value="">-- Select Format --</option>
                    <option value="Portable">Portable</option>
                    <option value="ISO">ISO</option>
                    <option value="Repack">Repack</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700">Digital Storage</label>
                <input type="text" name="digital_storage" placeholder="e.g., External HDD, PS5, Xbox" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
            </div>
            <div class="flex items-center">
                <input type="checkbox" name="is_physical" class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                <label class="ml-2 block text-sm font-medium text-gray-700">Physical Copy</label>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600">Add Game</button>
        </form>
    </div>
</body>
</html>