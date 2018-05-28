<?php
namespace LeoGalleguillos\Twitter\Model\Service\Tweet;

class ShouldTweetOccur
{
    /**
     * @return bool
     */
    public function shouldTweetOccur() : bool
    {
        return (1 == rand(1, 3));
    }
}
