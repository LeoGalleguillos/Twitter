<?php
namespace LeoGalleguillos\Twitter\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class TweetLog
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
        int $entityTypeId
    ) {
        $sql = '
            INSERT
              INTO `tweet_log` (`entity_type_id`)
            VALUES (?)
                 ;
        ';
        $parameters = [
            $entityTypeId,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }

    public function selectCountWhereEntityTypeId(int $entityTypeId) : int
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `tweet_log`
             WHERE `entity_type_id` = ?
                 ;
        ';
        $row = $this->adapter->query($sql)->execute([$entityTypeId])->current();
        return (int) $row['count'];
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `tweet_log`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }
}
