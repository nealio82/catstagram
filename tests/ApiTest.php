<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
     * Test POSTing to the '/upload' endpoint with a valid id returns a success message
     *
     * @return void
     */
    public function testPostImageWithValidFilename()
    {
        $this->json('POST', '/api/upload/', ['filename' => "images/img1.jpg"])
            ->seeJsonContains([
                'filename' => 'images/img1.jpg'
            ])->assertResponseStatus(200)->seeJson();
    }

    /**
     * Test POSTing to the '/upload' endpoint with a valid id returns a success message
     *
     * @return void
     */
    public function testPostImageWithInvalidFilename()
    {
        $this->json('POST', '/api/upload/', ['filename' => 'images/bleurgh'])
            ->seeJsonEquals([
                'filename' => 'images/bleurgh',
                'message' => 'images/bleurgh is not a valid filename',
            ])->assertResponseStatus(400);
    }
}
