<?php

namespace App\Model\Contract;


interface RemoteFileInfoUploader
{

    public function uploadInfo($filename);

    public function errorCode();

    public function remoteUri();

}