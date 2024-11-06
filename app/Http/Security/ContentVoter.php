<?php

namespace App\Http\Security;

use Core\Http\Security\VoterInterface;
use Core\Http\User\UserInterface;

class ContentVoter implements VoterInterface
{
    const READ = 'content.read';
    const CREATE = 'content.create';
    const DELETE = 'content.delete';
    const UPDATE = 'content.update';

    public function supports(string $permssion, mixed $subject = NULL): bool
    {
        if (!in_array($permssion, [self::READ, self::CREATE, self::UPDATE, self::DELETE])) {
            return false;
        }

        return true;
    }

    public function voteOnAttribute(UserInterface $user, string $permission, $subject = null): bool
    {
        $user = $user->getUser();

        switch ($permission) {
            case self::READ:
                return true;
            break;
            case self::CREATE:
                //
            break;
            case self::DELETE:
                //
            break;
            case self::UPDATE:
                //
            break;
        }

        return false;
    }
}