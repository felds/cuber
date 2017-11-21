<?php
declare(strict_types=1);

namespace App\Controller;

use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Config;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UploadTestController extends Controller
{
    /**
     * @Route("test-upload")
     */
    public function __invoke(Request $request, AwsS3Adapter $adapter)
    {
        $config = new Config();

        $file = $request->files->get('upload');
        if ($file instanceof UploadedFile && $file->isValid()) {
            $stream = fopen($file->getRealPath(), 'r+');
            $adapter->writeStream($file->getClientOriginalName(), $stream, $config);
            fclose($stream);
        }

        return new Response('
            <form method="POST" enctype="multipart/form-data">
                <input type="file" name="upload">
                <button type="submit">Up and away!</button>
            </form>
        ');
    }
}
