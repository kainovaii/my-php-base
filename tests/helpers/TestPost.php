<?php

namespace tests\helpers;

use App\Core\Http\Security\VoterInterface;
use App\Core\Http\User\UserInterface;

class TestPost
{
    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    public function getAuthor()
    {
        return $this->user;
    }
}