<?php
//The url you wish to send the POST request to
$url = "EAAHuDGsS5zYBAIlqfcgefOjyZCRsIKrxgNtZCa79LJZCZChIjaYD2b8uMbOKuVZCwkFLPZBdih4KWc35J3CgplhUrXG3yp8Ynv6z8UuGrJzwZCtDE5ebnZC4KBmzMEjSMCEW85JtRMdR8n22jloyWmpAeFT0aPgBZCspoovMjEZCLcmqkBI1uyOMCZCOFrf1yOBFDHUjiB2WcXkoAZDZD";

//The data you want to send via POST
$fields = [
    '__VIEWSTATE '      => $state,
    '__EVENTVALIDATION' => $valid,
    'btnSubmit'         => 'Submit'
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);
echo $result;
?>