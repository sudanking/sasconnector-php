<?php

require_once 'SASConnector.php';

$sitenumber = 58;

$api = new SASConnector('cloud.intouch-sd.com', 'admin', 'Genie999@');
$api->login();

$payload = 'U2FsdGVkX19fbnGs42aIeOP1DkT/YSl3zNGwduJyywF+y3Lcbk54BBwPGr/2t+yPr2shHBrkpl1cICNL/b1aN2o6uwCmJZOUVyGKYSRFCNUVa4AZBwDPuqYCKRwqaERQmHWvpoozJ+VLLIAKGifhqyVo5Lz7UHgWWLJWMlejSTx9tMSYC4iRI+fBbuXAX84K4qqLyQ6GbKRAYJSo9PiJHefm9QmKCvNllRQ4m+f07FYTKG0zUyqkKe+MoZz3/XTWI64B+qciKceATAePkkJ27SNRq04egwbbSNZvTGkie3HvsIjHpd8Pw4QnuE+2SP1FvI+oJ6wSiwDMCJ2hap7/3S2A/2NiZf+mx5rRAO12K0I=';

$res = $api->decpayload($payload);

print_r(json_decode($res));

echo $res;