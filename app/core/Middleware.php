<?php

declare(strict_types = 1);

namespace application\core;

interface Middleware 
{
    public function handle(): bool;
}