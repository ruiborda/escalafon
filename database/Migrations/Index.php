<?php


namespace DataBase\Migrations;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class Index extends Command
{
    protected static $defaultName = 'migrate:refresh';
    
    protected function configure(): void
    {
        $this
            ->setDescription('Refrescar migración')
            ->setHelp('Este comando refresca la migración ejecutando down() y luego up()');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            \Escalafon\Config\Database::load();
            (new Usuario())->down();
            (new Usuario())->up();
            $output->write('Migracición completa!');
            return Command::SUCCESS;
        } catch (\Exception $e) {
            $output->write('Ocurrio un Error!');
            return Command::FAILURE;
        }
    }
}