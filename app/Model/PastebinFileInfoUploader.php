<?php

namespace App\Model;

use App\Model\Contract\LocalFileStore;
use App\Model\Contract\RemoteFileInfostore;
use App\Model\Contract\RemoteFileInfoUploader;
use Illuminate\Filesystem\FilesystemManager;

class PastebinFileInfoUploader implements RemoteFileInfoUploader
{

    private $remoteUri;
    /**
     * @var FilesystemManager
     */
    private $localFilestore;
    /**
     * @var RemoteFileInfostore
     */
    private $remoteFileInfostore;

    /**
     * @param LocalFileStore $localFileStore
     * @param RemoteFileInfostore $remoteFileInfostore
     */
    public function __construct(LocalFileStore $localFileStore, RemoteFileInfostore $remoteFileInfostore)
    {
        $this->localFilestore = $localFileStore;
        $this->remoteFileInfostore = $remoteFileInfostore;
    }

    public function uploadInfo($filename)
    {

        if (!$this->localFilestore->has($filename)) {
            /**
             * Whoah there boy, that file didn't exist.
             */
            throw new \DomainException(sprintf("%s is not a valid filename", $filename));
        }

        /**
         * Filename is valid, go ahead and upload to pastebin
         */
        try {

            $response = $this->remoteFileInfostore->postDetails($this->localFilestore->size($filename), $filename);

            /*
             *  WTF!? Pastebin returns a 200 response even if the post isn't successful!! We'll have to
             * check here that the response contains a URI
             */
            if (stripos($response, 'http') !== 0) {
                throw new \DomainException($response);
            }

            $this->remoteUri = $response;
            return;

        } catch (\HttpException $e) {
            /**
             * Something went wrong along the way, we'd better inform the user about it
             * (but don't expose the full error message!)
             */
            throw new \DomainException("There was an error, please try again");

        }

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