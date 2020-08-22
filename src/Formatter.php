<?php

namespace App;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Formatter extends Command
{
    protected function configure()
    {
        $this
            ->setName('formatter')
            ->setDescription('format string')
            ->addArgument('string', InputArgument::REQUIRED, 'string for formatting')
            ->addOption('odd', null, InputOption::VALUE_OPTIONAL);
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $even = $input->getOption('odd') !== null ? 0 : 1;
        $str = $input->getArgument('string');
        $newStr = '';
        for ($i = 0; $i < strlen($str); $i++) {
            $newStr .= $i % 2 === $even ? strtoupper($str[$i]) : strtolower($str[$i]);
        }

        $output->writeln($newStr);

        return Command::SUCCESS;
    }
}
