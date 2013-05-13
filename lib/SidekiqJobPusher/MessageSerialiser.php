<?php

namespace SidekiqJobPusher;

class MessageSerialiser
{
    function serialise($workerClass, $args = array(), $retry = false)
    {
        return json_encode(array(
            'class' => $workerClass,
            'args'  => $args,
            'retry' => $retry
        ));
    }
}