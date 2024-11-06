<?php

declare(strict_types=1);

namespace App\Core;

interface Middleware
{
    public function handle(): bool;
}
