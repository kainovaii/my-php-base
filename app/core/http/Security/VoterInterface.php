<?php

namespace App\Core\Http\Security;

use App\Core\Http\User\UserInterface;

interface VoterInterface {
    
    public function supports(string $permssion, mixed $subject = null): bool;

    public function voteOnAttribute(UserInterface $user, string $permission, $subject = null): bool;
}