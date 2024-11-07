<?php

namespace App\Domain\Blog;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Support\Collection;

class BlogRepository extends Manager
{
    public function getAll(): Collection
    {
        return $this->table('blogs')
            ->get();
    }

    public function getSingle(int $id): object
    {
        return $this->table('blogs')
            ->where('id', $id)
            ->first();
    }
}