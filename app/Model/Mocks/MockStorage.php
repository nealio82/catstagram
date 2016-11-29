<?php

namespace App\Model\Mocks;

use Illuminate\Support\Facades\Storage;

class MockStorage extends Storage
{

    public static function disk($diskname)
    {
        return new static();
    }

    public static function size($filename)
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