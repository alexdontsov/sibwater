<?php

namespace App\Command\Sentinel2;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class SentinelApiHub
 * @package App\Command\Sentinel2
 */
class SentinelApiHub extends Command
{
    protected static $defaultName = 'sentinel2:download';

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        return Command::SUCCESS;
    }
}