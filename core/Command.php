<?php
namespace Core;

use Core\Command\CreateMigrationCommand;
use Core\Command\MigrateCommand;
use Symfony\Component\Console\Application;

class Command {
    public function run()
    {
        $commmandManager = new Application();

        $commmandManager->add(new MigrateCommand);
        $commmandManager->add(new CreateMigrationCommand);

        $commmandManager->run();
    }
}