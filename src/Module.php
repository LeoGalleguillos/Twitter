<?php
namespace LeoGalleguillos\Twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use LeoGalleguillos\Twitter\Model\Factory\View\Helper\ShareUrl as ShareUrlHelperFactory;
use LeoGalleguillos\Twitter\Model\Service as TwitterService;
use LeoGalleguillos\Twitter\Model\Table as TwitterTable;
use LeoGalleguillos\Twitter\View\Helper\ShareUrl as ShareUrlHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                    'shareUrl' => ShareUrlHelper::class,
                ],
                'factories' => [
                    ShareUrlHelper::class => ShareUrlHelperFactory::class,
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                TwitterService\Retweet\ShouldRetweetOccur::class => function ($serviceManager) {
                    return new TwitterService\Retweet\ShouldRetweetOccur();
                },
                TwitterService\Search::class => function ($serviceManager) {
                    return new TwitterService\Search();
                },
                TwitterTable\RetweetLog::class => function ($serviceManager) {
                    return new TwitterTable\RetweetLog(
                        $serviceManager->get('main')
                    );
                },
                TwitterTable\TweetLog::class => function ($serviceManager) {
                    return new TwitterTable\TweetLog(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
