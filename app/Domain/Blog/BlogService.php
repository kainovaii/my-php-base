<?php

namespace App\Domain\Blog;

use Illuminate\Database\Capsule\Manager;

class BlogService extends Manager
{
    private int $id;
    
    public function interate(int $id): void
    {
        $this->id = $id;
    }

    public function update(array $data)
    {
        return $this->table('blogs')
            ->where(['id' => $this->id])
            ->update($data);
    }

    public function create(array $data): bool
    {
        return $this->table('blogs')
            ->insert($data);
    }

    public function delete(): bool
    {
        return $this->table('blogs')
            ->delete();
    }
}