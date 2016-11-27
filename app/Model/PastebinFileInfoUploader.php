<?php

namespace App\Model;

use App\Model\Infrastructure\RemoteFileInfostore;
use App\Model\Infrastructure\RemoteFileInfoUploader;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Support\Facades\Storage;

class PastebinFileInfoUploader implements RemoteFileInfoUploader
{

    private $errorCode;
    private $errorMessage;
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
     * PastebinFileInfoUploader constructor.
     * @param Storage $localFilestore
     * @param RemoteFileInfostore $remoteFileInfostore
     */
    public function __construct(Storage $localFilestore, RemoteFileInfostore $remoteFileInfostore)
    {
        $this->localFilestore = $localFilestore::disk('public');
        $this->remoteFileInfostore = $remoteFileInfostore;
    }

    public function uploadInfo($filename)
    {

        if (!$this->localFilestore->has($filename)) {
            /**
             * Whoah there boy, that file didn't exist.
             */
            $this->errorCode = 400;
            $this->errorMessage = sprintf("%s is not a valid filename", $filename);
            throw new \DomainException($this->errorMessage);
        }

        /**
         * Filename is valid, go ahead and upload to pastebin
         */
        try {

            $uri = $this->remoteFileInfostore->postDetails($this->localFilestore->size($filename), $filename);

            $this->remoteUri = $uri;

        } catch (\Exception $e) {
            /**
             * Something went wrong along the way, we'd better inform the user about it
             * (but don't expose the full error message!)
             */
            $this->errorCode = 500;
            $this->errorMessage = "There was an error, please try again";
            throw new \DomainException($this->errorMessage);

        }

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
     * Error message in case of failed upload
     * Either upload error (will not be exposed to user)
     * or user has chosen a non-existent image (will be exposed to user)
     * @return mixed
     */
    public function errorMessage()
    {
        return $this->errorMessage;
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