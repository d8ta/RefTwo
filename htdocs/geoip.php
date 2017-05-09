<?php

if (isset($_COOKIE['country_code']) && isset($_COOKIE['lat_ip']) && isset($_COOKIE['lng_ip'])) {
	return;
}

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}

if ($ip == "192.168.0.1") {
	$ip = '77.119.243.65';
}


$gi = geoip_open(__DIR__ . "/GeoIPCity.dat", GEOIP_STANDARD);

$record = geoip_record_by_addr($gi, $ip);

$country_code = strtolower($record->country_code);

setcookie('country_code', $country_code, time() + 3600 * 24, '/');

setcookie('lat_ip', $record->latitude, time() + 3600 * 24, '/');
setcookie('lng_ip', $record->longitude, time() + 3600 * 24, '/');