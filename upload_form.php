<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Games via CSV</title>
</head>
<body>
    <h1>Upload Games via CSV</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="csv_file">CSV File:</label>
        <input type="file" name="csv_file" id="csv_file" accept=".csv" required>
        <button type="submit">Upload</button>
    </form>
</body>
</html>