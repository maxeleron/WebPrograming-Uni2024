<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вибір області</title>
</head>
<body>
    <h1>Виберіть область</h1>
    <form action="process.php" method="post">
        <select name="region">
            <?php
            $file = fopen("oblinfo.txt", "r");
            $numRegions = fgets($file);
            for ($i = 0; $i < $numRegions; $i++) {
                $region = trim(fgets($file));
                fgets($file); // Пропустити населення
                fgets($file); // Пропустити кількість ВНЗ
                echo "<option value='$region'>$region</option>";
            }
            fclose($file);
            ?>
        </select>
        <button type="submit">Відправити</button>
    </form>
</body>
</html>
