<?php

namespace App\Model\Infrastructure;


interface RemoteFileInfoUploader
{

    public function uploadInfo($filename);

    public function errorCode();

    public function errorMessage();

    public function remoteUri();

}