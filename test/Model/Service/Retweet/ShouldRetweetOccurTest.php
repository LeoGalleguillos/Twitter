<?php
namespace LeoGalleguillos\TwitterTest\Model\Service\Retweet;

use LeoGalleguillos\Twitter\Model\Service as TwitterService;
use PHPUnit\Framework\TestCase;

class TwitterTest extends TestCase
{
    protected function setUp()
    {
        $this->shouldRetweetOccurService = new TwitterService\Retweet\ShouldRetweetOccur();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            TwitterService\Retweet\ShouldRetweetOccur::class,
            $this->shouldRetweetOccurService
        );
    }
}
