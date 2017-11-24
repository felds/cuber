<?php
declare(strict_types=1);

namespace App\Entity\Panorama;

use App\Entity\Image;
use App\Entity\Panorama;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity()
 */
final class Equirectangular extends Panorama
{
    /**
     * @var Image
     * @ORM\OneToOne(targetEntity=Image::class)
     * @Assert\NotNull()
     */
    private $image;

    public function getImage(): Image
    {
        return $this->image;
    }

    public function setImage(Image $image): self
    {
        $this->image = $image;
        return $this;
    }
}
