<?php
namespace LeoGalleguillos\Twitter;

use LeoGalleguillos\Twitter\Model\Factory\View\Helper\ShareUrl as ShareUrlHelperFactory;
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
                TwitterTable\RetweetLog::class => function ($serviceManager) {
                    return new TwitterTable\RetweetLog(
                        $serviceManager->get('main')
                    );
                },
            ],
        ];
    }
}
