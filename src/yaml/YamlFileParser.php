<?php


namespace Andrew\PhpHorizonConfigsLoader\yaml;

use Symfony\Component\Yaml\Yaml;

class YamlFileParser
{
    /**
     * @var YamlFileParser
     */
    private static $instance;

    /**
     * gets the instance via lazy initialization (created on first usage)
     */
    public static function getInstance(): YamlFileParser
    {
        if (null === static::$instance) {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public function parse(string $path, bool $dotNotation): array
    {
        return $dotNotation ? array_dot(Yaml::parseFile($path)) : Yaml::parseFile($path);
    }
}
