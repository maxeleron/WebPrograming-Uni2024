<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Напрямки навчання</title>
</head>
<body>
    <h1>Виберіть напрямок навчання</h1>
    <form action="process.php" method="post">
        <select name="napr">
            <?php
            $file = fopen("napr.txt", "r");
            while (!feof($file)) {
                $line = fgets($file);
                if (!empty(trim($line))) {
                    echo "<option value='".trim($line)."'>".trim($line)."</option>";
                }
            }
            fclose($file);
            ?>
        </select>
        <button type="submit">Відправити</button>
    </form>
</body>
</html>
