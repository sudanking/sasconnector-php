<?php

require_once 'SASConnector.php';

$sitenumber = 59;

$api = new SASConnector('cloud.intouch-sd.com', 'admin', 'Genie999@');
$api->login();
$res = $api->get('system/deleteExpiredUsers', []);
//     'headers' => [
//         'User-Agent' => 'testing/1.0',
//         'Accept'     => 'application/json',
//         'X-Foo'      => ['Bar', 'Baz']
//     ]
// ]);
print_r(json_decode($res));
echo $res;
