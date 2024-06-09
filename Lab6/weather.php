<?php
function get_weather_data($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function extract_weather_data($html) {
    $data = [];

    // Витягування назви міста
    preg_match('/<h1 class="page-title">(.+?)<\/h1>/', $html, $matches);
    $data['city'] = $matches[1];

    // Витягування часу сходу і заходу сонця
    preg_match('/Схід<\/strong>(.*?)<\/li>/', $html, $matches);
    $data['sunrise'] = strip_tags($matches[1]);
    preg_match('/Захід<\/strong>(.*?)<\/li>/', $html, $matches);
    $data['sunset'] = strip_tags($matches[1]);

    // Витягування температури протягом дня
    preg_match_all('/<span class="unit unit_temperature_c">(.+?)<\/span>/', $html, $matches);
    $data['temperatures'] = $matches[1];

    return $data;
}

$url = 'https://www.gismeteo.ua/city/hourly/5053/';
$html = get_weather_data($url);
$data = extract_weather_data($html);

echo "<p>Місто: {$data['city']}</p>";
echo "<p>Схід сонця: {$data['sunrise']}</p>";
echo "<p>Захід сонця: {$data['sunset']}</p>";
echo "<h2>Температура протягом дня:</h2>";
echo "<ul>";
foreach ($data['temperatures'] as $temp) {
    echo "<li>$temp</li>";
}
echo "</ul>";
?>
