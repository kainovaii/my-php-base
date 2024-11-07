<?php

namespace tests\helpers;

use Core\Http\Security\VoterInterface;
use Core\Http\User\UserInterface;

class VoterAlwaysFalse implements VoterInterface
{
    public function supports(string $permssion, mixed $subject = null): bool
    {
        return false;
    }

    public function voteOnAttribute(UserInterface $user, string $permission, $subject = null): bool
    {
        return false;
    }
}