<?php

namespace tests\helpers;

use Core\Http\Security\VoterInterface;
use Core\Http\User\UserInterface;

class VoterRole implements VoterInterface
{
    public function supports(string $permssion, $subject = null): bool
    {
        return true;
    }

    public function voteOnAttribute(UserInterface $user, string $permission, $subject = null): bool
    {
        if ($user->getRoles() === 'ROLE_USER')
        {
            return true;
        }
    }
}