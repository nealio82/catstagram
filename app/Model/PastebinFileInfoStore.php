<?php

namespace App\Model;

use App\Model\Contract\HttpPostTransport;
use App\Model\Contract\RemoteFileInfostore;

class PastebinFileInfoStore implements RemoteFileInfostore
{

    /**
     * @var HttpPostTransport
     */
    private $httpTransport;

    /**
     * PastebinFileInfoStore constructor.
     * @param HttpPostTransport $httpTransport
     */
    public function __construct(HttpPostTransport $httpTransport)
    {
        $this->httpTransport = $httpTransport;
    }

    /**
     * @param $filesize
     * @param $filename
     * @return mixed
     */
    public function postDetails($filesize, $filename)
    {

        $url = env('PASTEBIN_URI');

        $params = [
            'api_option' => 'paste',
            'api_dev_key' => env('PASTEBIN_KEY'),
            'api_paste_private' => '0',
            'api_paste_expire_date' => '10M',
            'api_paste_format' => 'php',
            'api_paste_name' => $filename,
            'api_paste_code' => sprintf("%s has a size of %s bytes", $filename, $filesize)
        ];

        return $this->httpTransport->request($url, $params);

    }


}