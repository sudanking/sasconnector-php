<?php

require_once 'SASConnector.php';

$sitenumber = 58;

$api = new SASConnector('cloud.intouch-sd.com', 'admin', 'Genie999@');
$api->login();

$payload = 'U2FsdGVkX19/352bPxa5ionTsULecMZBjqrA9gLMca3o3SPf6qQCIqEGdocFDnesPq5nH77l6iLyg/B6jHy+MUJANO2oWy367CjSFmh/GFxHmRlJAOHo11DYWMvrr/51sltZtvVsg0fmNzJUQDVCqnLFtBGhkwHQhtd6F9E9QkSkIOvPMr6M62FAtjfN2rB0Qg48OsN0Wti2efRDhY7498soqd4as3oSElOtcYWUlkFlwjqR+Nee2I+ojtOmZu3WIW4MGpOJzePQbSQPpVQugQ==';

$res = $api->decpayload($payload);

$output = json_decode($res);

echo $output->page;