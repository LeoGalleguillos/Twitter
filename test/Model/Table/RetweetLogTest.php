<?php
namespace LeoGalleguillos\TwitterTest\Model\Table;

use Exception;
use LeoGalleguillos\Twitter\Model\Table as TwitterTable;
use LeoGalleguillos\TwitterTest\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class RetweetLogTest extends TableTestCase
{
    /**
     * @var string
     */
    protected $sqlPath = __DIR__ . '/../../..' . '/sql/leogalle_test/retweet_log/';

    protected function setUp()
    {
        $configArray     = require(__DIR__ . '/../../../config/autoload/local.php');
        $configArray     = $configArray['db']['adapters']['leogalle_test'];
        $this->adapter   = new Adapter($configArray);

        $this->retweetLogTable      = new TwitterTable\RetweetLog($this->adapter);

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
            TwitterTable\RetweetLog::class,
            $this->retweetLogTable
        );
    }

    public function testInsertAndSelectCount()
    {
        $this->retweetLogTable->insert(
            123
        );

        $this->retweetLogTable->insert(
            456
        );

        $this->assertSame(
            2,
            $this->retweetLogTable->selectCount()
        );
    }
}
