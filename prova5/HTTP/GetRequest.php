<?php

namespace Http;

class GetRequest extends Request
{
    public function __construct($body)
    {
        $this->setBody($body);
    }
}
