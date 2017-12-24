<?php
namespace LeoGalleguillos\Twitter\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ShareUrl extends AbstractHelper
{
    public function __invoke()
    {
        return $this;
    }

    public function getShareUrl(string $url) : string
    {
        return 'https://twitter.com/intent/tweet?url='
             . urlencode($url);
    }
}
