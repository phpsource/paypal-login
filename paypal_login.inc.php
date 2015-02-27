<?php
    // helper package autoload.
    require('vendor/autoload.php');
    include_once 'constants.php';
    // setting some variables here.
    $clientId = CLIENT_ID;
    $clientSecret = SECRET;
    $requestData = '?grant_type=authorization_code&code='.$_GET['code'].'&return_url=http://sandbox.hellofrancesco.com/paypal_test/return.php';
 
    // here we exchange the authorization code with access and refresh tokens.
    $response = \Httpful\Request::get('https://api.sandbox.paypal.com/v1/identity/openidconnect/tokenservice' . $requestData)
    ->authenticateWith($clientId, $clientSecret)
    ->send();
 
    $jsonResponse = json_decode($response->raw_body);
 
    // checking out for errors.
    if(isset($jsonResponse->error))
    {
        die('Error: just got some problems during operations. Try again.');
    }
 
    // getting user data, using the Identity APIs.
    $response = \Httpful\Request::get('https://api.sandbox.paypal.com/v1/identity/openidconnect/userinfo/?schema=openid')
    ->contentType("application/json")
    ->authorization($jsonResponse->access_token)
    ->authenticateWith($clientId, $clientSecret)
    ->send();
 
    // user data is here!
    $user = json_decode($response->raw_body);
?>