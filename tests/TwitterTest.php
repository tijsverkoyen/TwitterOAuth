<?php

require_once 'config.php';
require_once '../Twitter.php';
require_once 'PHPUnit/Framework/TestCase.php';

use \TijsVerkoyen\Twitter\Twitter;

/**
 * test case.
 */
class TwitterTest extends PHPUnit_Framework_TestCase
{
    /**
     * Twitter instance
     *
     * @var	Twitter
     */
    private $twitter;

    /**
     * Prepares the environment before running a test.
     */
    protected function setUp()
    {
        parent::setUp();
        $this->twitter = new Twitter(CONSUMER_KEY, CONSUMER_SECRET);
        $this->twitter->setOAuthToken(OAUTH_TOKEN);
        $this->twitter->setOAuthTokenSecret(OAUTH_TOKEN_SECRET);
    }

    /**
     * Cleans up the environment after running a test.
     */
    protected function tearDown()
    {
        $this->twitter = null;
        parent::tearDown();
    }

    /**
     * Test if an array is a direct message
     * @param array $item
     */
    private function isDirectMessage(array $item)
    {
        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('text', $item);
        $this->assertArrayHasKey('created_at', $item);
        $this->assertArrayHasKey('sender', $item);
        $this->isUser($item['sender']);
        $this->assertArrayHasKey('recipient', $item);
        $this->isUser($item['recipient']);
    }

    /**
     * Test if an array is a tweet
     * @param array $item
     */
    private function isTweet(array $item)
    {
        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('text', $item);
        $this->assertArrayHasKey('created_at', $item);
        $this->assertArrayHasKey('user', $item);
    }

    /**
     * Test if an array is a user
     * @param array $item
     */
    private function isUser(array $item)
    {
        $this->assertArrayHasKey('id', $item);
        $this->assertArrayHasKey('created_at', $item);
        $this->assertArrayHasKey('url', $item);
        $this->assertArrayHasKey('lang', $item);
        $this->assertArrayHasKey('name', $item);
        $this->assertArrayHasKey('screen_name', $item);
        $this->assertArrayHasKey('verified', $item);
    }

    /**
     * Tests Twitter->getTimeOut()
     */
    public function testGetTimeOut()
    {
        $this->twitter->setTimeOut(5);
        $this->assertEquals(5, $this->twitter->getTimeOut());
    }

    /**
     * Tests Twitter->getUserAgent()
     */
    public function testGetUserAgent()
    {
        $this->twitter->setUserAgent('testing/1.0.0');
        $this->assertEquals('PHP Twitter/' . Twitter::VERSION . ' testing/1.0.0', $this->twitter->getUserAgent());
    }

    /**
     * Tests Twitter->statusesMentionsTimeline()
     */
    public function testStatusesMentionsTimeline()
    {
        $response = $this->twitter->statusesMentionsTimeline(2);

        $this->assertEquals(count($response), 2);
        foreach ($response as $row) {
            $this->isTweet($row);
        }
    }

    /**
     * Tests Twitter->statusesUserTimeline()
     */
    public function testStatusesUserTimeline()
    {
        $response = $this->twitter->statusesUserTimeline(null, null, null, 2);

        $this->assertEquals(count($response), 2);
        foreach ($response as $row) {
            $this->isTweet($row);
        }
    }

    /**
     * Tests Twitter->statusesHomeTimeline()
     */
    public function testStatusesHomeTimeline()
    {
        $response = $this->twitter->statusesHomeTimeline(2);

        $this->assertEquals(count($response), 2);
        foreach ($response as $row) {
            $this->isTweet($row);
        }
    }

    /**
     * Tests Twitter->statusesRetweetsOfMe()
     */
    public function testStatusesRetweetsOfMe()
    {
        $response = $this->twitter->statusesRetweetsOfMe(2);

        $this->assertEquals(count($response), 2);
        foreach ($response as $row) {
            $this->isTweet($row);
        }
    }

    /**
     * Tests Twitter->statusesRetweets()
     */
    public function testStatusesRetweets()
    {
        $response = $this->twitter->statusesRetweets('21947795900469248', 2);

        $this->assertEquals(count($response), 2);
        foreach ($response as $row) {
            $this->isTweet($row);
        }
    }

    /**
     * Tests Twitter->statusesShow()
     */
    public function testStatusesShow()
    {
        $response = $this->twitter->statusesShow('210462857140252672');
        $this->isTweet($response);
    }

    /**
     * Tests Twitter->statusesDestroy()
     */
    public function testStatusesDestroy()
    {
        $response = $this->twitter->statusesUpdate('Running the tests.. 私のさえずりを設定する '. time());
        $response = $this->twitter->statusesDestroy($response['id']);
        $this->isTweet($response);
    }

    /**
     * Tests Twitter->statusesUpdate()
     */
    public function testStatusesUpdate()
    {
        $response = $this->twitter->statusesUpdate('Running the tests.. 私のさえずりを設定する '. time());
        $this->isTweet($response);
        $this->twitter->statusesDestroy($response['id']);
    }

    /**
     * Tests Twitter->statusesRetweet()
     */
    public function testStatusesRetweet()
    {
        $response = $this->twitter->statusesRetweet('241259202004267009');
        $this->isTweet($response);
        $this->twitter->statusesDestroy($response['id']);
    }

    /**
     * Tests Twitter->statusesOEmbed()
     */
    public function testStatusesOEmbed()
    {
        $response = $this->twitter->statusesOEmbed('240192632003911681');
        $this->assertArrayHasKey('provider_name', $response);
        $this->assertArrayHasKey('provider_url', $response);
        $this->assertArrayHasKey('author_name', $response);
        $this->assertArrayHasKey('author_url', $response);
        $this->assertArrayHasKey('url', $response);
        $this->assertArrayHasKey('cache_age', $response);
        $this->assertArrayHasKey('type', $response);
        $this->assertArrayHasKey('version', $response);
        $this->assertArrayHasKey('height', $response);
        $this->assertArrayHasKey('width', $response);
        $this->assertArrayHasKey('html', $response);
    }

    /**
     * Tests Twitter->searchTweets()
     */
    public function testSearchTweets()
    {
        $response = $this->twitter->searchTweets('#freebandnames');
        $this->assertArrayHasKey('statuses', $response);
        foreach ($response['statuses'] as $row) {
            $this->isTweet($row);
        }
        $this->assertArrayHasKey('search_metadata', $response);
        $this->assertArrayHasKey('completed_in', $response['search_metadata']);
        $this->assertArrayHasKey('max_id', $response['search_metadata']);
        $this->assertArrayHasKey('query', $response['search_metadata']);
        $this->assertArrayHasKey('refresh_url', $response['search_metadata']);
        $this->assertArrayHasKey('count', $response['search_metadata']);
        $this->assertArrayHasKey('since_id', $response['search_metadata']);
    }

    /**
     * Tests Twitter->directMessages()
     */
    public function testDirectMessages()
    {
        $response = $this->twitter->directMessages();
        foreach ($response as $row) {
            $this->isDirectMessage($row);
        }
    }

    /**
     * Tests Twitter->directMessagesSent()
     */
    public function testDirectMessagesSent()
    {
        $response = $this->twitter->directMessagesSent();
        foreach ($response as $row) {
            $this->isDirectMessage($row);
        }
    }

    /**
     * Tests Twitter->directMessagesShow()
     */
    public function testDirectMessagesShow()
    {
        $response = $this->twitter->directMessagesShow('264022285470547969');
        $this->isDirectMessage($response);
    }

    /**
     * Tests Twitter->directMessagesDestroy
     */
    public function testDirectMessagesDestroy()
    {
        $response = $this->twitter->directMessagesNew(null, 'tijs_dev', 'Running the tests.. 私のさえずりを設定する '. time());
        $response = $this->twitter->directMessagesDestroy($response['id']);
        $this->isDirectMessage($response);
    }

    /**
     * Tests Twitter->directMessagesNew
     */
    public function testDirectMessagesNew()
    {
        $response = $this->twitter->directMessagesNew(null, 'tijs_dev', 'Running the tests.. 私のさえずりを設定する '. time());
        $this->isDirectMessage($response);
        $this->twitter->directMessagesDestroy($response['id']);
    }

    /**
     * Tests Twitter->reportSpam()
     */
    public function testReportSpam()
    {
        $response = $this->twitter->reportSpam('FujitaKatsuhisa');
        $this->isUser($response);
    }

    /**
     * Tests Twitter->helpLanguages()
     */
    public function testHelpLanguages()
    {
        $response = $this->twitter->helpLanguages();
        foreach ($response as $row) {
            $this->assertArrayHasKey('name', $row);
            $this->assertArrayHasKey('status', $row);
            $this->assertArrayHasKey('code', $row);
        }
    }

    /**
     * Tests Twitter->helpPrivacy()
     */
    public function testHelpPrivacy()
    {
        $response = $this->twitter->helpPrivacy();
        $this->assertArrayHasKey('privacy', $response);
    }

    /**
     * Tests Twitter->helpTos()
     */
    public function testHelpTos()
    {
        $response = $this->twitter->helpTos();
        $this->assertArrayHasKey('tos', $response);
    }

    /**
     * Tests Twitter->applicationRateLimitStatus()
     */
    public function testApplicationRateLimitStatus()
    {
        $response = $this->twitter->applicationRateLimitStatus();
        $this->assertArrayHasKey('rate_limit_context', $response);
        $this->assertArrayHasKey('resources', $response);
        foreach ($response['resources'] as $row) {
            foreach ($row as $subRow) {
                $this->assertArrayHasKey('limit', $subRow);
                $this->assertArrayHasKey('remaining', $subRow);
                $this->assertArrayHasKey('reset', $subRow);
            }
        }
    }
}
