<?php
namespace LeoGalleguillos\Twitter\Model\Service\Retweet;

class ShouldRetweetOccur
{
    public function shouldRetweetOccur() : bool
    {
        return (1 == rand(1, 3));
    }
}
