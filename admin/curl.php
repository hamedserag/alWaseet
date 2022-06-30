<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>الوسيط | تواصل معنا</title>
</head>

<body>
    <?php
    //curl command
    $curl = curl_init();
    $token = "EAAHuDGsS5zYBABy3t4jrRc19E4LCssUZBxbpddlYS1sxFqoKfgyesdsnBJX7sbSChc1mrj2MalBZBmHMNpkUjvILgMRyiV6C1sB6cORNANwAqUUsnGvxqvJoPamIcZAijHrQK2TttqLi6WpfsCZBTFqMKAuTpYCwM8h7J7ZBAzSSxO4aXR9C82wM7hnM8Sa8M7Pg0C7a1fwZDZD";
    curl_setopt_array($curl, [
        CURLOPT_URL =>  "https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=543212080129846&client_secret=897b9938a6980c64551dce41b037b46a&fb_exchange_token=".$token,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "curl -i -X GET ",
        ],
    ]);
    //response of curl
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl); //end of curl fetch
    if ($err) { //curl error catching
        echo "cURL Error #:" . $err;
    } else { //curl response handling
        echo ($response);
    }
