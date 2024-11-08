<?php

namespace App\Domain\Blog\Event;

class BlogListener
{
    public function __invoke($event): void
    {
        $object = $event->getObject();

        dump($object);
    }
}
