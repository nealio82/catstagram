<?php

use App\Model\Contract\RemoteFileInfoUploader;
use App\Model\Mocks\MockPostTransport;
use App\Model\Mocks\MockRemoteFileInfoUploader;
use App\Model\Mocks\MockStorage;
use App\Model\PastebinFileInfoStore;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;

class PastebinFileInfoStoreTest extends TestCase
{

    /**
     * Test postDetails method returns what the post transport returns
     *
     * @return void
     */
    public function testPostDetails()
    {

        $fileInfoStore = new PastebinFileInfoStore(new MockPostTransport());

        $this->assertEquals($fileInfoStore->postDetails('example.jpg', 181225), 'http://example.com/paste_url');

    }

}
