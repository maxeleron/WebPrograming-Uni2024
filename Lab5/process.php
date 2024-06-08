<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результат</title>
</head>
<body>
    <h1>Інформація про область</h1>
    <?php
    $selectedRegion = $_POST['region'];
    $file = fopen("oblinfo.txt", "r");
    $numRegions = fgets($file);
    while (!feof($file)) {
        $region = trim(fgets($file));
        $population = trim(fgets($file));
        $universities = trim(fgets($file));
        if ($region == $selectedRegion) {
            echo "<p>Область: $region</p>";
            echo "<p>Населення: $population тис. чол.</p>";
            echo "<p>Кількість ВНЗ: $universities</p>";
            break;
        }
    }
    fclose($file);
    ?>
    <a href="index.php">Назад</a>
</body>
</html>
