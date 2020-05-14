<?php

namespace Touchdesign\MaintenanceBundle\Utils;

use Psr\Log\LoggerInterface;

class MaintenanceHandler
{
    /**
     * @var string Application dir.
     */
    private $appDir;

    /**
     * @var LoggerInterface
     */
    private $logger;

    public function __construct(string $appDir, LoggerInterface $logger)
    {
        $this->appDir = $appDir;
        $this->logger = $logger;
    }

    public function down(): self
    {
        $this->logger->info('Shutdown app for maintenance');

        dump($this->appDir);

        return $this;
    }

    public function up(): self
    {
        $this->logger->info('Up app from maintenance');

        return $this;
    }

    public function isMaintenance(): self
    {
        $this->logger->info('Query maintenance status');

        return $this;
    }

    public function handle(): self
    {
        $this->logger->info('Handle maintenance mode');

        return $this;
    }
}