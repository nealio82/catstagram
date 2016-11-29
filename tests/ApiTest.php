<?php

use App\Model\Contract\RemoteFileInfoUploader;
use App\Model\Mocks\MockRemoteFileInfoUploader;
use App\Model\Mocks\MockStorage;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Storage;

class ApiTest extends TestCase
{
    /**
     * Test the '/list' API endpoint shows the list of images in the directory
     *
     * @return void
     */
    public function testListImages()
    {
        $this->json('GET', '/api/list/')
            ->seeJsonStructure([
                '*' => [
                    'path'
                ]
            ]);
    }

    /**
     * Test POSTing to the '/upload' endpoint with a valid filename returns a success message
     *
     * @return void
     */
    public function testPostImageWithValidFilename()
    {

        $this->app->bind(RemoteFileInfoUploader::class, MockRemoteFileInfoUploader::class);

        $this->json('POST', '/api/upload/', ['filename' => "images/example.jpg"])
            ->seeJsonContains([
                'filename' => 'images/example.jpg'
            ])->assertResponseStatus(200)->seeJson();
    }

    /**
     * Test POSTing to the '/upload' endpoint with an invalid filename returns an error message and a 400 http response
     *
     * @return void
     */
    public function testPostImageWithInvalidFilename()
    {

        $this->app->bind(RemoteFileInfoUploader::class, MockRemoteFileInfoUploader::class);

        $this->json('POST', '/api/upload/', ['filename' => 'images/bleurgh'])
            ->seeJsonEquals([
                'filename' => 'images/bleurgh',
                'message' => 'images/bleurgh is not a valid filename',
            ])->assertResponseStatus(400)->seeJson();
    }
}
