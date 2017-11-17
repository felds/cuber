<?php
declare(strict_types=1);

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity()
 */
final class Cube implements Traits\TimestampableInterface
{
    use Traits\Timestampable;

    /**
     * @ORM\Id()
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @ORM\Column()
     * @Assert\NotBlank()
     */
    private $name = "";

    public function __construct()
    {
        $this->id = Uuid::uuid4();
    }

    public function getId(): string
    {
        return $this->id;
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
}
