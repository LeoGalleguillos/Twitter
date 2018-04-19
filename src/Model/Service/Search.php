<?php
namespace LeoGalleguillos\Twitter\Model\Service;

use Abraham\TwitterOAuth\TwitterOAuth;
use stdClass;

class Search
{
    public function search(
        TwitterOAuth $twitterOAuth,
        string $query
    ) : stdClass {
        return $twitterOAuth->get(
            'search/tweets',
            ['q' => $query]
        );
    }
}
