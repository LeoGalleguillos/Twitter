<?php
namespace LeoGalleguillos\TwitterTest;

use LeoGalleguillos\Twitter\Module;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    protected function setUp()
    {
        $this->module = new Module();
    }

    public function testInstance()
    {
        $this->assertInstanceOf(Module::class, $this->module);
    }
}
