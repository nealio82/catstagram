<?php

namespace App\Model\Mocks;

use App\Model\Contract\HttpPostTransport;

class MockPostTransport implements HttpPostTransport
{

    /**
     * @param $uri
     * @param array $params
     * @return mixed
     */
    public function request($uri, $params = [])
    {

        return 'http://example.com/paste_url';

    }

}