<?php


namespace DataBase\Seeders;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class Index extends Command
{
    protected static $defaultName = 'db:seed';
    
    protected function configure(): void
    {
        $this
            ->setDescription('Sembrar Usuarios')
            ->setHelp('Este comando inserta datos en las tablas');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            \Escalafon\Config\Database::load();
            (new Usuario())->run();
            $output->write('Seed success!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->write('Seed Error!' . $e);
            return Command::FAILURE;
        }
    }
}