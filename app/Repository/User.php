<?php
namespace App\Repository;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Collection;

class User extends Manager {

    public function getAll(): Collection
    {
        return $this->table('users')
            ->get();
    }

    public function get(int $id): Collection
    {
        return $this->table('users')
            ->where(['id' => $id])
            ->get();
    }
}