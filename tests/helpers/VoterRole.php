<?php

namespace tests\helpers;

use App\Core\Http\Security\VoterInterface;
use App\Core\Http\User\UserInterface;

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