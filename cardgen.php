<?php

require_once 'SASConnector.php';


if ( $argc <= 2 ) {
    exit("No site number or profile ID..");
}

$profileID = $argv[1];
$siteOwner = $argv[2];

$qty = 2000;
// $siteOwner = 45;
// $profileID = 6;
$expiration = "2024-12-31 00:00:00";

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
