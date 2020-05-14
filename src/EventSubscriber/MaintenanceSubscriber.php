<?php

/*
 * This file is a part of MaintenanceBundle a touchdesign project.
 *
 * (c) 2020 Christin Gruber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Touchdesign\MaintenanceBundle\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Touchdesign\MaintenanceBundle\Utils\MaintenanceHandler;

class MaintenanceSubscriber implements EventSubscriberInterface
{
    /**
     * @var MaintenanceHandler
     */
    private $maintenanceHandler;

    public function __construct(MaintenanceHandler $maintenanceHandler)
    {
        $this->maintenanceHandler = $maintenanceHandler;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        if ($this->maintenanceHandler->isMaintenance()) {
            $this->maintenanceHandler->handle();
        }
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::REQUEST => ['onKernelRequest', 255],
        ];
    }
}
