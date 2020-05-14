<?php

/*
 * This file is a part of MaintenanceBundle a touchdesign project.
 *
 * (c) 2020 Christin Gruber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Touchdesign\MaintenanceBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Touchdesign\MaintenanceBundle\Utils\MaintenanceHandler;

class MaintenanceDownCommand extends Command
{
    /**
     * @var MaintenanceHandler
     */
    private $maintenanceHandler;

    public function __construct(MaintenanceHandler $maintenanceHandler)
    {
        $this->maintenanceHandler = $maintenanceHandler;

        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setName('touch:maintenance:down')
            ->setDescription('Shutdown the whole app')
            ->addOption('until', null, InputOption::VALUE_OPTIONAL, 'Shutdown until...')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if ($input->getOption('until')) {
            // ...
        }

        $this->maintenanceHandler->down();

        $io->success('Whole app is successful down for maintenance.');

        return 0;
    }
}
