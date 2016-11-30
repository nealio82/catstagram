<?php

namespace App\Model\Contract;

interface RemoteFileInfostore
{

    /**
     * RemoteFileInfostore constructor.
     * @param HttpPostTransport $httpTransport
     * @param $api_key
     * @param $api_url
     */
    public function __construct(HttpPostTransport $httpTransport, $api_key, $api_url);

    /**
     * @param $filesize
     * @param $filename
     * @return mixed
     */
    public function postDetails($filesize, $filename);


}