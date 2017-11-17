<?php
declare(strict_types=1);

namespace App\Doctrine\EventListener;

use App\Entity\Traits\TimestampableInterface;
use DateTimeImmutable;
use Doctrine\Common\EventSubscriber;
use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use Doctrine\ORM\Events;

class TimestampSubscriber implements EventSubscriber
{
    public function getSubscribedEvents(): array
    {
        return [
            Events::prePersist,
            Events::preUpdate,
        ];
    }

    public function prePersist(LifecycleEventArgs $args): void
    {
        $this->updateTimestamp($args);
    }

    public function preUpdate(LifecycleEventArgs $args): void
    {
        $this->updateTimestamp($args);
    }

    private function updateTimestamp(LifecycleEventArgs $args): void
    {
        $entity = $args->getEntity();

        if (! $entity instanceof TimestampableInterface) return;

        $entity->setUpdatedAt(new DateTimeImmutable());
    }
}
