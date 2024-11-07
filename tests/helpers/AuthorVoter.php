<?php

namespace tests\helpers;

use Core\Http\Security\VoterInterface;
use Core\Http\User\UserInterface;

class AuthorVoter implements VoterInterface
{
    const EDIT = 'edit_post';

    public function supports(string $permission, $subject = null): bool
    {
        return $permission === self::EDIT && $subject instanceof TestPost;
    }

    public function voteOnAttribute(UserInterface $user, string $permission, $subject = null): bool
    {
        if (!$subject instanceof TestPost)
        {
            throw new \RuntimeException('Le sujet doit etre un instance de ' . TestPost::class); 
        }

        return true;
    }
}