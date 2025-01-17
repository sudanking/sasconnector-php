<?php

require_once 'SASConnector.php';

// using $argc and $argv 
// more info: https://www.igorkromin.net/index.php/2017/12/07/how-to-pass-parameters-to-your-php-script-via-the-command-line/

if ( $argc <= 1 ) {
    exit("No site number to create...");
}


$sitenumber = $argv[1];

$api = new SASConnector('cloud.intouch-sd.com', 'admin', 'Genie999@');
$api->login();

//Add NAS
$res = $api->post('nas', [
    "shortname" => "wz00" . $sitenumber . "[]",
    "enabled" => 1,
    "nasname" => "172.16.2." . $sitenumber,
    "secret" => "9onqr89d",
    "type" => 1,
    "version" => "mikrtik_6.36",
    "coa_port" => "1700",
    "site_id" => null,
    "ip_accounting_enabled" => 1,
    "http_port" => "80",
    "pool_name" => null,
    "monitor" => 1,
    "snmp_community" => null,
    "description" => null,
    "ssh_username" => null,
    "ssh_password" => null,
    "ssh_port" => "22"
]);
print_r(json_decode($res));
$output = json_decode($res);

echo $status = ($output->status == 200) ?  "Create Main NAS server...\n" : "Error Creating Main NAS!! \n";  

//Add Backup NAS
$res = $api->post('nas', [
    "shortname" => "wz00" . $sitenumber . "[Backup]",
    "enabled" => 1,
    "nasname" => "172.16.5." . $sitenumber,
    "secret" => "9onqr89d",
    "type" => 1,
    "version" => "mikrtik_6.36",
    "coa_port" => "1700",
    "site_id" => null,
    "ip_accounting_enabled" => 1,
    "http_port" => "80",
    "pool_name" => null,
    "monitor" => 1,
    "snmp_community" => null,
    "description" => null,
    "ssh_username" => null,
    "ssh_password" => null,
    "ssh_port" => "22"
]);
// print_r(json_decode($res));
$output = json_decode($res);
echo $status = ($output->status == 200) ?  "Create Backup NAS server...\n" : "Error Creating Backup NAS!!\n"; 

//Add Manager
$res = $api->post('manager', [
    "username" => "wz00" . $sitenumber,
    "enabled" => 1,
    "password" => "Admin99$",
    "confirm_password" => "Admin99$",
    "acl_group_id" => 21,
    "parent_id" => 4,
    "firstname" => "Site number " . $sitenumber,
    "lastname" => "WiZone",
    "company" => null,
    "email" => null,
    "phone" => null,
    "city" => null,
    "address" => null,
    "notes" => null,
    "subscriber_prefix" => null,
    "subscriber_suffix" => null,
    "max_users" => "0",
    "site_id" => null,
    "debt_limit" => "0",
    "discount_rate" => "0",
    "mikrotik_addresslist" => null,
    "allowed_ppp_services" => null,
    "allowed_nases" => [],
    "requires_2fa" => 0,
    "admin_notes" => null,
    "limit_delete" => 0,
    "limit_delete_count" => "0",
    "limit_rename" => 0,
    "limit_rename_count" => "0",
    "limit_profile_change" => 0,
    "limit_profile_change_count" => "0",
    "limit_mac_change" => 0,
    "limit_mac_change_count" => "0"
]);
// print_r(json_decode($res));
$output = json_decode($res);
echo $status = ($output->status == 200) ?  "Create New Manager...\n" : "Error can not create New Manager...\n"; 