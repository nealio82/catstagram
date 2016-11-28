<?php

namespace App\Model\Contract;

interface RemoteFileInfostore
{

    /**
     * RemoteFileInfostore constructor.
     * @param HttpPostTransport $httpTransport
     */
    public function __construct(HttpPostTransport $httpTransport);

    /**
     * @param $filesize
     * @param $filename
     * @return mixed
     */
    public function postDetails($filesize, $filename);


}