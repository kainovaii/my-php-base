<?php

namespace App\Domain\Auth\Event;

use Core\Http\Service\RegisterServiceContainer;
use Core\Http\Service\Service;

class UserListener
{
    /**
     * @param UserLastLoginEvent $event
     */
    public function __invoke(UserLastLoginEvent $event): void
    {
        $object = $event->getObject();

        Service::get()->flash->success('zizi');
    }
}
