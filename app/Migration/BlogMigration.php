<?php

namespace App\Migration;

use Core\Database\Migration\Migration;
use Core\Database\Migration\MigrationInterface;
use Illuminate\Database\Schema\Blueprint;

class BlogMigration extends Migration implements MigrationInterface
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $this->schema->create('blog', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->string('author');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {

    }
}