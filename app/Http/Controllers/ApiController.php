<?php

namespace App\Http\Controllers;

use App\Model\Contract\RemoteFileInfoUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{

    /**
     * List the images within a directory and return it in JSON
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function listImages()
    {

        /*
         * Make ['img1', 'img2', ...] look like
         * ['path' => 'img1', 'path' => 'img2', ...]
         */
        $images = array_map(function ($image) {

            //check the mimetype, otherwise we get non-images appearing in the results!
            if(stripos(Storage::disk('public')->mimeType($image), 'Image') === 0) {
                return ['path' => $image];
            }

        }, Storage::disk('public')->allFiles('images'));

        // array filter removes any null values which have been caught by the strpos mimetype check
        return response(json_encode(array_filter($images)));

    }

    /**
     * @param Request $request
     * @param \App\Http\Controllers\RemoteFileInfoUploader $uploader
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function uploadImage(Request $request, RemoteFileInfoUploader $uploader)
    {
        $filename = $request->get('filename');

        try {

            $uploader->uploadInfo($filename);

            return response(json_encode([
                'filename' => $filename,
                'uri' => $uploader->remoteUri()
            ]));

        } catch (\Exception $e) {

            return response(json_encode([
                'filename' => $filename,
                'message' => $e->getMessage()
            ]), 500);

        }

    }

}