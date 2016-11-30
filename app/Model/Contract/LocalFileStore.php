<?php

namespace App\Model\Contract;

interface LocalFileStore
{

    public function has($filename);

    public function size($filename);

}