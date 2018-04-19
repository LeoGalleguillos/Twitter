<?php
namespace LeoGalleguillos\TwitterTest\Model\Service;

use LeoGalleguillos\Twitter\Model\Service as TwitterService;
use PHPUnit\Framework\TestCase;

class SearchTest extends TestCase
{
    protected function setUp()
    {
        $this->searchService = new TwitterService\Search();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            TwitterService\Search::class,
            $this->searchService
        );
    }
}
