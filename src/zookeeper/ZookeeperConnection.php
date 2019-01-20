<?php

namespace Spartaques\PhpHorizonConfigsLoader\zookeeper;

class ZookeeperConnection
{
    private $url;
    private $node;

    /**
     * @return mixed
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return mixed
     */
    public function getNode()
    {
        return $this->node;
    }

    public function __construct($url, $node)
    {
        $this->url = $url;
        $this->node = $node;
    }
}
