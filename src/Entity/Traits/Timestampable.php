<?php
declare(strict_types=1);

namespace App\Entity\Traits;

use DateTimeInterface;

trait Timestampable
{
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $updatedAt;

    public function getUpdatedAt(): ?DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeInterface $updatedAt): TimestampableInterface
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
