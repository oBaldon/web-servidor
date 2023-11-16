<?php

namespace Http;

trait TraitSend
{
    public function send()
    {
        echo "Header: {$this->header}\n";
        echo "Body: {$this->body}\n";
    }
}
