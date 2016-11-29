<?php

namespace App\Model\Mocks;

use App\Model\Contract\RemoteFileInfostore;
use App\Model\Contract\RemoteFileInfoUploader;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;

class MockRemoteFileInfoUploader implements RemoteFileInfoUploader
{

    private $errorCode;
    private $remoteUri;
    /**
     * @var FilesystemManager
     */
    private $localFilestore;

    /**
     * PastebinFileInfoUploader constructor.
     * @param Storage $localFilestore
     * @param RemoteFileInfostore $remoteFileInfostore
     */
    public function __construct(MockStorage $localFilestore)
    {
        $this->localFilestore = $localFilestore::disk('public');
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


        return 'http://example.com/asdfkjasd';


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