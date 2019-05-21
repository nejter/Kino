<?php
header('Content-Type: application/javascript');
$service_url = 'https://api.themoviedb.org/3/movie/now_playing?api_key=c2d0997b4c5e436954c9aef733d6a86b&language=pl-PL&page=1';
$curl = curl_init($service_url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$curl_response = curl_exec($curl);
if ($curl_response === false) {
    $info = curl_getinfo($curl);
    curl_close($curl);
    die('error occured during curl exec. Additional info: ' . var_export($info));
}
curl_close($curl);
$decoded = json_decode($curl_response);
if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
    die('error occured: ' . $decoded->response->errormessage);
}
echo json_encode($decoded);
