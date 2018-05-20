<?php
namespace LeoGalleguillos\Twitter\Model\Service\Tweet;

class ShouldTweetOccur
{
    public function shouldTweetOccur() : bool
    {
        return (1 == rand(1, 5));
    }
}
