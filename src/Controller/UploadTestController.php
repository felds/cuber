<?php
declare(strict_types=1);

namespace App\Controller;

use Aws\S3\S3Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class UploadTestController extends Controller
{
    /**
     * @Route("test-upload")
     */
    public function __invoke(S3Client $fs)
    {
        dump($fs);
        die;
    }
}
