<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Результати</title>
</head>
<body>
    <h1>Статистика по напрямку: <?php echo $_POST['napr']; ?></h1>
    <table border="1">
        <tr>
            <th>Університет</th>
            <th>Середній бал на бюджет</th>
            <th>Кількість на бюджет</th>
            <th>Кількість на контракт</th>
        </tr>
        <?php
        $napr = $_POST['napr'];
        $file = fopen("data.txt", "r");
        while (!feof($file)) {
            $line = fgets($file);
            if (trim($line) == $napr) {
                $numUniv = fgets($file);
                for ($i = 0; $i < $numUniv; $i++) {
                    $avgScore = fgets($file);
                    $numBudget = fgets($file);
                    $numContract = fgets($file);
                    $univName = fgets($file);
                    echo "<tr>
                            <td>$univName</td>
                            <td>$avgScore</td>
                            <td>$numBudget</td>
                            <td>$numContract</td>
                          </tr>";
                }
                break;
            }
        }
        fclose($file);
        ?>
    </table>
    <a href="index.php">Назад</a>
</body>
</html>
