<?php

namespace App\Model;

use App\Model\Contract\HttpPostTransport;

class CurlPostTransport implements HttpPostTransport
{

    /**
     * @param $uri
     * @param array $params
     * @return mixed
     */
    public function request($uri, $params = [])
    {

        $ch = curl_init($uri);

        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_NOBODY, 0);

        $response = curl_exec($ch);

        if (curl_getinfo($ch, CURLINFO_HTTP_CODE) != 200) {
            throw new \DomainException("Failed transfer!");
        }

        return $response;

    }

}