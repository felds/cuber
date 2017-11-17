<?php
declare(strict_types=1);

namespace App\Doctrine\EventListener;

use Doctrine\Common\EventSubscriber;
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

    public function prePersist()
    {
        die("prePersist");
    }

    public function preUpdate()
    {
        die("preUpdate");
    }
}
