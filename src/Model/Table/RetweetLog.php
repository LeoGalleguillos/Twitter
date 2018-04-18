<?php
namespace LeoGalleguillos\Twitter\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class RetweetLog
{
    /**
     * @var Adapter
     */
    protected $adapter;

    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function insert(
        int $tweetId
    ) {
        $sql = '
            INSERT
              INTO `retweet_log` (`tweet_id`)
            VALUES (?)
                 ;
        ';
        $parameters = [
            $tweetId,
        ];
        return $this->adapter
                    ->query($sql, $parameters)
                    ->getGeneratedValue();
    }

    public function selectCountWhereTweetId(int $tweetId)
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `retweet_log`
             WHERE `tweet_id` = ?
                 ;
        ';
        $row = $this->adapter->query($sql, [$tweetId])->current();
        return (bool) $row['count'];
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `retweet_log`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }
}
