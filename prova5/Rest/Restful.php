<?php

namespace Rest;

use Http\Request;

class Restful
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function build()
    {
        $this->request->send();
    }
}

