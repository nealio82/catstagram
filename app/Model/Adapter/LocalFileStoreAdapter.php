<?php

namespace App\Model\Adapter;

use App\Model\Contract\LocalFileStore;

class LocalFileStoreAdapter implements LocalFileStore
{

    private $storage;

    public function __construct($storage)
    {
        $this->storage = $storage;
    }

    public function has($filename)
    {
        return $this->storage->has($filename);
    }

    public function size($filename)
    {
        return $this->storage->size($filename);
    }
}