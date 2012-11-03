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

//	$response = $twitter->statusesRetweets('21947795900469248');
//	$response = $twitter->statusesShow('210462857140252672');
//	$response = $twitter->statusesDestroy('264832934299705344');
//	$response = $twitter->statusesUpdate('Running the tests.. 私のさえずりを設定する '. time());
//	$response = $twitter->statusesRetweet('241259202004267009');
//	@todo $response = $twitter->statusesUpdateWithMedia();
//	$response = $twitter->statusesOEmbed('240192632003911681');

//	$response = $twitter->searchTweets('#freebandnames');

//	$response = $twitter->directMessages();
//	$response = $twitter->directMessagesSent();
//  $response = $twitter->directMessagesShow('264022285470547969');
//	$response = $twitter->directMessagesDestroy('264854339762393088');
//	$response = $twitter->directMessagesNew(null, 'tijs_dev', 'Running the tests.. 私のさえずりを設定する '. time());
} catch (Exception $e) {
    var_dump($e);
}

// output
var_dump($response);
