<?php
namespace LeoGalleguillos\Twitter;

use LeoGalleguillos\Twitter\Model\Factory\View\Helper\ShareUrl as ShareUrlHelperFactory;

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
            ],
        ];
    }
}
