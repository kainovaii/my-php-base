<?php
namespace application\migrations;

use Core\Database\Migration\Migration;
use Core\Database\Migration\MigrationInterface;
use Illuminate\Database\Schema\Blueprint;

class RoleMigration extends Migration implements MigrationInterface
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $this->schema->create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('policy');
            $table->string('prefix');
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