<?php
declare(strict_types=1);

namespace App\Entity;

use App\Repository\CubeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass=CubeRepository::class)
 */
final class Cube implements Traits\TimestampableInterface
{
    use Traits\Timestampable;

    /**
     * @var string
     * @ORM\Id()
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column()
     * @Assert\NotBlank()
     */
    private $name = "";

    /**
     * @var Panorama
     * @ORM\OneToOne(targetEntity=Panorama::class)
     * @Assert\NotNull()
     */
    private $panorama;

    public function __construct()
    {
        $this->id = (string) Uuid::uuid4();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): string
    {
        return (string) $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPanorama(): Panorama
    {
        return $this->panorama;
    }

    public function setPanorama(Panorama $panorama): self
    {
        $this->panorama = $panorama;

        return $this;
    }
}
