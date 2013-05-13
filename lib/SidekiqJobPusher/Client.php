<?php

namespace SidekiqJobPusher;

use Predis\Client as PredisClient;

class Client
{
    private $redis;

    function __construct(PredisClient $redis, $namespace = null)
    {
        $this->redis = $redis;
        $this->namespace = $namespace;

        $this->keyGenerator = new KeyGenerator;
        $this->messageSerialiser = new MessageSerialiser;
    }

    function perform($workerClass, $arguments = array(), $retry = false, $queue = 'default')
    {
        $key = $this->keyGenerator->generate($queue, $this->namespace);
        $message = $this->messageSerialiser->serialise($workerClass, $arguments, $retry);
        
        $this->redis->lpush($key, $message);
    }
}