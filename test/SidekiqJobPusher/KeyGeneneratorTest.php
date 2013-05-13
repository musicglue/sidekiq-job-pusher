<?php

namespace SidekiqJobPusher;

class KeyGeneratorTest extends \PHPUnit_Framework_TestCase
{
    private $generator;

    function setUp()
    {
        $this->generator = new KeyGenerator;
    }

    function testGenerateKey()
    {
        $namespace = 'my_namespace';
        $queue     = 'my_queue';

        $this->assertEquals($this->generator->generate($queue, $namespace), 'my_namespace:queue:my_queue');
    }

    function testGenerateKeyWithoutNamespace()
    {
        $queue = 'my_queue';

        $this->assertEquals($this->generator->generate($queue), 'queue:my_queue');
    }

    function testGenerateKeyWithDefaultArgs()
    {
        $this->assertEquals($this->generator->generate(), 'queue:default');
    }
}