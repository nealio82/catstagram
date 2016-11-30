<?php

namespace App\Model\Mocks;

use App\Model\Contract\LocalFileStore;
use Illuminate\Support\Facades\Storage;

class MockStorage extends Storage implements LocalFileStore
{

    public static function disk($diskname)
    {
        return new static();
    }

    public function size($filename)
    {
        return 181224;
    }

    public function has($filename)
    {
        if ($filename == 'images/example.jpg') {
            return true;
        }

        return false;
    }

}