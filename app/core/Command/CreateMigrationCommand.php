<?php
namespace App\Core\Command;

use App\Core\Database;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Path;
use Illuminate\Database\Capsule\Manager as DB;

#[AsCommand(
    name: 'migration:create',
    hidden: false,
)]
class CreateMigrationCommand extends Command
{
    protected function configure(): void
    {
        $this->addArgument('file', InputArgument::REQUIRED, 'File migration');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $file = $input->getArgument('file');

        $db = new Database();
        $db->connection();

        $filesystem = new Filesystem();

        $newFilePath = Path::normalize(dirname(__DIR__, 2).'/migrations/'.$file.'.php');
        $baseFilePath = Path::normalize(dirname(__DIR__, 2).'/migrations/BaseMigration.php');

        if ($filesystem->exists($newFilePath))
        {
            $io->error('The migration file already exist');
        } else {
            try {           
                $filesystem->copy($baseFilePath, $newFilePath);
                $filesystem->chmod($newFilePath, '7777');
    
                $req = DB::table('migrations')->insert([
                    'file' => $file,
                    'class' => 'application\\migrations\\'.$file,
                ]);
    
                if ($req) {
                    $io->success('Migration has been created');
                } else {
                    $io->success('Migration is unsuccessful');
                }
            } catch (IOExceptionInterface $exception) {
                echo "An error occurred while creating your directory at ".$exception->getPath();
            }
        }

        return COMMAND::SUCCESS;
    }
}