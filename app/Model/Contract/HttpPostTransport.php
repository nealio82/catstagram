<?php

namespace App\Model\Contract;

interface HttpPostTransport
{
    /**
     * @param $uri
     * @param array $params
     * @return mixed
     */
    public function request($uri, $params = []);

}