<?php


namespace AppBundle\Command;


use AppBundle\MyCustom\MyCustomInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class AppCommand extends Command
{
    protected function configure()
    {
        $this->setName('app:run');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $classes = get_declared_classes();
        foreach ($classes as $classname) {
            $reflect = new \ReflectionClass($classname);

            if ($reflect->implementsInterface(MyCustomInterface::class)) {
                $output->writeln('<info>CLASS HAS BEEN FOUND</info>');
            } else {
                $output->write('.');
            }
        }
    }


}