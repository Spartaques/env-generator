<?php

namespace Andrew\PhpHorizonConfigsLoader;

use Andrew\PhpHorizonConfigsLoader\yaml\YamlFileParser;

class YamlFileParserTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @test
     */
    public function yaml_file_parser_works()
    {
        $configs = YamlFileParser::getInstance()->parse(__DIR__ . '/configs/application.yml', false);
        $this->assertEquals($configs, require __DIR__ . '/configs/expectedConfigs.php');
        $this->assertTrue(true);
    }
}
