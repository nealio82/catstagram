<?php

namespace App\Model\Mocks;

use App\Model\Contract\LocalFileStore;

class MockStorage implements LocalFileStore
{

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