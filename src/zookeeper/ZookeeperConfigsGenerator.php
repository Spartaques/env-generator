<?php

namespace Spartaques\PhpHorizonConfigsLoader\zookeeper;

use Kyoz\ZookeeperClient;

class ZookeeperConfigsGenerator
{
    public function getConfigs(ZookeeperConnection $zookeeperConnection)
    {
        $zk = new ZookeeperClient($zookeeperConnection->getUrl());
        $configs = $zk->loadNode($zookeeperConnection->getNode());
        return $configs;
    }
}
