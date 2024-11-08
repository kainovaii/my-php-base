<?php
namespace application\migrations;

use Core\Database\Migration\Migration;
use Core\Database\Migration\MigrationInterface;
use Illuminate\Database\Schema\Blueprint;

class PolicyMigration extends Migration implements MigrationInterface
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $this->schema->create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('permissions');
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