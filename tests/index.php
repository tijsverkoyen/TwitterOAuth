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

//	@todo $response = $twitter->friendsIds();
//	@todo $response = $twitter->followersIds();
//	@todo $response = $twitter->friendshipsLookup();
//	@todo $response = $twitter->friendshipsIncoming();
//	@todo $response = $twitter->friendshpsOutgoing();
//	@todo $response = $twitter->friendshipsCreate();
//	@todo $response = $twitter->friendshipsDestroy();
//	@todo $response = $twitter->friendshipsUpdate();
//	@todo $response = $twitter->friendshipsShow();

//	@todo $response = $twitter->accountSettings();
//	@todo $response = $twitter->accountVerifyCredentials();
//	@todo $response = $twitter->accountSettingsUpdate();
//	@todo $response = $twitter->accountUpdateDeliveryDevice();
//	@todo $response = $twitter->accountUpdateProfile();
//	@todo $response = $twitter->accountUpdateProfileBackgroundImage();
//	@todo $response = $twitter->accountUpdateProfileColors();
//	@todo $response = $twitter->accountUpdateProfileImage();
//	@todo $response = $twitter->blocksLists();
//	@todo $response = $twitter->blocksIds();
//	@todo $response = $twitter->blocksCreate();
//	@todo $response = $twitter->blocksDestroy();
//	@todo $response = $twitter->usersLookup();
//	@todo $response = $twitter->usersShow();
//	@todo $response = $twitter->usersSearch();
//	@todo $response = $twitter->usersContributees();
//	@todo $response = $twitter->usersContributors();

//	@todo $response = $twitter->usersSuggestionsSlug();
//	@todo $response = $twitter->usersSuggestions();
//	@todo $response = $twitter->usersSuggestionsMembers();

//	@todo $response = $twitter->favoritesList();
//	@todo $response = $twitter->favoritesDestroy();
//	@todo $response = $twitter->favoritesCreate();

//	@todo $response = $twitter->listsList();
//	@todo $response = $twitter->listsStatuses();
//	@todo $response = $twitter->listsMembersDestroy();
//	@todo $response = $twitter->listsMemberships();
//	@todo $response = $twitter->listsSubscribers();
//	@todo $response = $twitter->listsSubscribersCreate();
//	@todo $response = $twitter->listsSubscribersShow();
//	@todo $response = $twitter->listsSubscribersDestroy();
//	@todo $response = $twitter->listsMembersCreateAll();
//	@todo $response = $twitter->listsMembersShow();
//	@todo $response = $twitter->listsMembers():
//	@todo $response = $twitter->listsMembersCreate();
//	@todo $response = $twitter->listsDestroy();
//	@todo $response = $twitter->listsUpdate();
//	@todo $response = $twitter->listsCreate();
//	@todo $response = $twitter->listsShow();
//	@todo $response = $twitter->listsSubscriptions();
//	@todo $response = $twitter->listsMembersDestroyAll();

//	@todo $response = $twitter->savedSearchesList();
//	@todo $response = $twitter->savedSearchesShow();
//	@todo $response = $twitter->savedSearchesCreate();
//	@todo $response = $twitter->savedSearchesDestroy();

//	$response = $twitter->geoId('df51dec6f4ee2b2c');
//	$response = $twitter->geoReverseGeoCode(37.7821120598956, -122.400612831116);
//	$response = $twitter->geoSearch(37.7821120598956, -122.400612831116);
//	$response = $twitter->geoSimilarPlaces(37.7821120598956, -122.400612831116, 'Twitter HQ');
//	$response = $twitter->geoPlace('Twitter HQ', '247f43d441defc03', '36179c9bf78835898ebf521c1defd4be', 37.7821120598956, -122.400612831116, array('street_address' => '795 Folsom St'));

//	$response = $twitter->trendsPlace(1);
//	$response = $twitter->trendsAvailable();
//	$response = $twitter->trendsClosest(37.781157, -122.400612831116);

//	$response = $twitter->reportSpam('FujitaKatsuhisa');

//	$response = $twitter->helpConfiguration();
//	$response = $twitter->helpLanguages();
//	$response = $twitter->helpPrivacy();
//	$response = $twitter->helpTos();
//	$response = $twitter->applicationRateLimitStatus();
} catch (Exception $e) {
    var_dump($e);
}

// output
var_dump($response);
