<?php
namespace LeoGalleguillos\TwitterTest\Model\Table;

use Exception;
use LeoGalleguillos\Twitter\Model\Table as TwitterTable;
use LeoGalleguillos\TwitterTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class TweetLogTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/tweet_log/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);

        $this->tweetLogTable      = new TwitterTable\TweetLog($this->adapter);

        $this->setForeignKeyChecks0();
        $this->dropTable();
        $this->createTable();
        $this->setForeignKeyChecks1();
    }

    protected function dropTable()
    {
        $sql = file_get_contents($this->sqlPath . 'drop.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    protected function createTable()
    {
        $sql = file_get_contents($this->sqlPath . 'create.sql');
        $result = $this->adapter->query($sql)->execute();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            TwitterTable\TweetLog::class,
            $this->tweetLogTable
        );
    }

    public function testInsertAndSelectCount()
    {
        $this->tweetLogTable->insert(
            123
        );

        $this->tweetLogTable->insert(
            456
        );

        $this->assertSame(
            2,
            $this->tweetLogTable->selectCount()
        );
    }

    public function testSelectCountWhereEntityTypeId()
    {
        $entityTypeId = 12345;

        $this->assertSame(
            0,
            $this->tweetLogTable->selectCountWhereEntityTypeId($entityTypeId)
        );

        $this->tweetLogTable->insert(
            $entityTypeId
        );
        $this->assertSame(
            1,
            $this->tweetLogTable->selectCountWhereEntityTypeId($entityTypeId)
        );
    }
}
