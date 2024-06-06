<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab3 - Таблиця ВНЗ України на PHP</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    $file = fopen("oblinfo.txt", "r");
    $numRegions = fgets($file);
    echo "<table border='1'>";
    echo "<tr><th>Назва області</th><th>Населення (тис. чол.)</th><th>Кількість ВНЗ</th></tr>";
    for ($i = 0; $i < $numRegions; $i++) {
        $region = fgets($file);
        $population = fgets($file);
        $universities = fgets($file);
        echo "<tr><td>$region</td><td>$population</td><td>$universities</td></tr>";
    }
    echo "</table>";
    fclose($file);
    ?>
</body>
</html>
