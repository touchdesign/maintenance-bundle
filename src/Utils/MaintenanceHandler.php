<?php

/*
 * This file is a part of MaintenanceBundle a touchdesign project.
 *
 * (c) 2020 Christin Gruber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Touchdesign\MaintenanceBundle\Utils;

use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;
use Touchdesign\MaintenanceBundle\Exception\MaintenanceException;

class MaintenanceHandler
{
    /**
     * @var string LockFile
     */
    private $lockFile;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(string $lockFile, LoggerInterface $logger, Filesystem $filesystem)
    {
        $this->lockFile = $lockFile;
        $this->logger = $logger;
        $this->filesystem = $filesystem;
    }

    public function down(): self
    {
        $this->logger->info('Shutdown app for maintenance');

        $this->filesystem->touch(
            $this->lockFile
        );

        return $this;
    }

    public function up(): self
    {
        $this->logger->info('Up app from maintenance');

        $this->filesystem->remove(
            $this->lockFile
        );

        return $this;
    }

    public function isMaintenance(): bool
    {
        $this->logger->info('Query maintenance status');

        if ($this->filesystem->exists($this->lockFile)) {
            return true;
        }

        return false;
    }

    public function handle(): void
    {
        $this->logger->info('Handle maintenance mode');

        throw new MaintenanceException();
    }
}
