<?php

namespace App\Model\Infrastructure;

interface HttpPostTransport
{
    /**
     * @param $uri
     * @param array $params
     * @return mixed
     */
    public function request($uri, $params = []);

}