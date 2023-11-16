<?php

namespace Http;

class Request
{
    use TraitSend;

    protected $header;
    protected $body;

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function setHeader($header)
    {
        $this->header = $header;
    }
}
