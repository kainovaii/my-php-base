<?php

namespace tests\helpers;

use App\Core\Http\Security\VoterInterface;
use App\Core\Http\User\UserInterface;

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