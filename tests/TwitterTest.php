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
            $this->assertArrayHasKey('id', $row);
            $this->assertArrayHasKey('text', $row);
            $this->assertArrayHasKey('created_at', $row);
            $this->assertArrayHasKey('user', $row);
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
            $this->assertArrayHasKey('id', $row);
            $this->assertArrayHasKey('text', $row);
            $this->assertArrayHasKey('created_at', $row);
            $this->assertArrayHasKey('user', $row);
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
            $this->assertArrayHasKey('id', $row);
            $this->assertArrayHasKey('text', $row);
            $this->assertArrayHasKey('created_at', $row);
            $this->assertArrayHasKey('user', $row);
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
            $this->assertArrayHasKey('id', $row);
            $this->assertArrayHasKey('text', $row);
            $this->assertArrayHasKey('created_at', $row);
            $this->assertArrayHasKey('user', $row);
        }
    }
}
