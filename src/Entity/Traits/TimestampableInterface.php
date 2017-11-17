<?php
declare(strict_types=1);

namespace App\Entity\Traits;

use DateTimeInterface;

interface TimestampableInterface
{
    public function getUpdatedAt(): ?DateTimeInterface;
    public function setUpdatedAt(DateTimeInterface $updatedAt): self;
}
