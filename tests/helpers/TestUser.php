<?php

namespace tests\helpers;

use App\Core\Http\Security\VoterInterface;
use App\Core\Http\User\UserInterface;

class TestUser implements UserInterface
{
    public function getRoles(): string
    {
        return 'ROLE_USER';
    }

    public function getUser(): array
    {
        return [];
    }

    public function getUserIdentifier(): string
    {
        return 'johndoe';
    }
}