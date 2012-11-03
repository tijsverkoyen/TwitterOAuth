<?php

//require
require_once '../../../autoload.php';
require_once 'config.php';

use \TijsVerkoyen\Twitter\Twitter;

// create instance
$twitter = new Twitter(CONSUMER_KEY, CONSUMER_SECRET);

// The code below will do the oAuth-dance
//$response = $twitter->oAuthRequestToken('http://classes.dev/TijsVerkoyen/Twitter/tests/');
//if(!isset($_GET['oauth_token'])) $response = $twitter->oAuthAuthorize($response['oauth_token']);
//$response = $twitter->oAuthAccessToken($_GET['oauth_token'], $_GET['oauth_verifier']);
//var_dump($response);
//exit;

$twitter->setOAuthToken(OAUTH_TOKEN);
$twitter->setOAuthTokenSecret(OAUTH_TOKEN_SECRET);

try {
//    $response = $twitter->statusesMentionsTimeline();
//    $response = $twitter->statusesUserTimeline();
//    $response = $twitter->statusesHomeTimeline();
//    $response = $twitter->statusesRetweetsOfMe();
} catch (Exception $e) {
    var_dump($e);
}

// output
var_dump($response);
