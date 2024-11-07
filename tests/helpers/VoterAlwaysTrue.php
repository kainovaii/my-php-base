<?php

namespace tests\helpers;

use Core\Http\Security\VoterInterface;
use Core\Http\User\UserInterface;

class VoterAlwaysTrue implements VoterInterface
{
    public function supports(string $permssion, mixed $subject = null): bool
    {
        return true;
    }

    public function voteOnAttribute(UserInterface $user, string $permission, $subject = null): bool
    {
        return true;
    }
}