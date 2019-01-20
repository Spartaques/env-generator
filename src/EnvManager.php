<?php


namespace Andrew\PhpHorizonConfigsLoader;

use Andrew\PhpHorizonConfigsLoader\yaml\YamlFileParser;
use Andrew\PhpHorizonConfigsLoader\zookeeper\ZookeeperConfigsGenerator;
use Andrew\PhpHorizonConfigsLoader\zookeeper\ZookeeperConnection;

class EnvManager
{
    public function getEnvVariablesFromYamlFile(string $path, $dotNotation = true)
    {
        return (new YamlFileParser())->parse($path, $dotNotation);
    }

    public function getEnvVariablesFromZookeeper($url, $node)
    {
        return (new ZookeeperConfigsGenerator())->getConfigs(new ZookeeperConnection($url, $node));
    }

    public function setEnvironmentVariable($name, $value = null)
    {
        // If PHP is running as an Apache module and an existing
        // Apache environment variable exists, overwrite it
        if (function_exists('apache_getenv') && function_exists('apache_setenv') && apache_getenv($name)) {
            apache_setenv($name, $value);
        }

        if (function_exists('putenv')) {
            putenv("$name=$value");
        }

        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}
