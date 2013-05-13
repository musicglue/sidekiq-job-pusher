<?php

namespace SidekiqJobPusher;

class MessageSerialiserTest extends \PHPUnit_Framework_TestCase
{
    private $seriliaser;

    function setUp()
    {
        $this->seriliaser = new MessageSerialiser;
    }

    function testSerialise()
    {
        $worker = 'MyWorker';
        $args   = array('arg1', 'arg2');
        $retry  = true;

        $this->assertEquals($this->seriliaser->serialise($worker, $args, $retry),
            '{"class":"MyWorker","args":["arg1","arg2"],"retry":true}');
    }

    function testSerialiseWithDefaultArgs()
    {
        $worker = 'MyWorker';

        $this->assertEquals($this->seriliaser->serialise($worker),
            '{"class":"MyWorker","args":[],"retry":false}');
    }
}