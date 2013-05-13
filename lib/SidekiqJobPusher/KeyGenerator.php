<?php

namespace SidekiqJobPusher;

class KeyGenerator
{
    function generate($queue = 'default', $namespace = null)
    {
        $parts = $this->compact(array($namespace, 'queue', $queue));
        return implode(':', $parts);
    }

    private function compact($array)
    {
        return array_filter($array, 'strlen');
    }
}