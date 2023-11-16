<?php

namespace Http;

class PostRequest extends Request
{
    public function __construct($body, $header)
    {
        $this->setBody($body);
        $this->setHeader($header);
    }
}
