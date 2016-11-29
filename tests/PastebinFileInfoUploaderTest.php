<?php

use App\Model\Contract\RemoteFileInfoUploader;
use App\Model\Mocks\MockPostTransport;
use App\Model\Mocks\MockRemoteFileInfoUploader;
use App\Model\Mocks\MockStorage;
use App\Model\PastebinFileInfoStore;
use App\Model\PastebinFileInfoUploader;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;

class PastebinFileInfoUploaderTest extends TestCase
{

    private $uploader;

    protected function setUp()
    {
        $this->uploader = new PastebinFileInfoUploader(new MockStorage(), new PastebinFileInfoStore(new MockPostTransport()));
    }

    /**
     * Test creating with a valid filename
     *
     * @return void
     */
    public function testPostImageValidFilename()
    {

        $this->uploader->uploadInfo("images/example.jpg");

        $this->assertEquals($this->uploader->remoteUri(), 'http://example.com/paste_url');

    }

    /**
     * Test creating with an invalid filename throws an exception
     *
     * @return void
     */
    public function testPostImageWithInvalidFilename()
    {
        $this->expectException(DomainException::class);

        $this->uploader->uploadInfo("images/bleurgh.jpg");

    }
}
