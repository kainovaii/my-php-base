<?php

namespace App\Core\Http\User;

interface UserInterface {
    
    public function getRoles(): string;

    public function getUser(): array;

    public function getUserIdentifier(): string;
}