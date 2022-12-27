<?php

require_once 'SASConnector.php';

$qty = 1000;
$siteOwner = 54;
$profileID = 14;
$expiration = "2024-12-30T00 =>00 =>00.000Z";

// $sitenumber = 59;

$api = new SASConnector('cloud.intouch-sd.com', 'admin', 'Genie999@');
$api->login();
$res = $api->post('card/generate', [
    "type" => 1,
    "qty" => $qty,
    "value" => "10",
    "expiration" => $expiration,
    "profile_id" => $profileID,
    "prefix" => null,
    "username_size" => 8,
    "password_size" => 4,
    "mac_login" => false,
    "sim_sessions" => "1",
    "owner" => $siteOwner,
    "password_username" => 1,
    "use_fixed_password" => 0,
    "fixed_password" => ""
]);
print_r(json_decode($res));
