<?php

namespace App\Model\Mocks;

use App\Model\Contract\RemoteFileInfoUploader;

class MockRemoteFileInfoUploader implements RemoteFileInfoUploader
{

    private $errorCode;
    private $remoteUri;
    private $localFilestore;

    /**
     * PastebinFileInfoUploader constructor.
     * @param MockStorage $localFilestore
     */
    public function __construct(MockStorage $localFilestore)
    {
        $this->localFilestore = $localFilestore;
    }

    public function uploadInfo($filename)
    {

        if (!$this->localFilestore->has($filename)) {
            /**
             * Whoah there boy, that file didn't exist.
             */
            $this->errorCode = 400;
            throw new \DomainException(sprintf("%s is not a valid filename", $filename));
        }

        return 'http://example.com/paste_url';

    }

    /**
     * Http error code in case of upload error
     * 400 | 500
     * @return mixed
     */
    public function errorCode()
    {
        return $this->errorCode;
    }

    /**
     * Remote URI of the file info which has been uploaded
     * @return mixed
     */
    public function remoteUri()
    {
        return $this->remoteUri;
    }
}