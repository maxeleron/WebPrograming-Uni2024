<?php
if (isset($_POST['ip'])) {
    $ip = $_POST['ip'];
    $url = "http://ip-api.com/json/$ip";
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response;
}
?>
