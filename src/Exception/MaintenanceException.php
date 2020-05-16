<?php

/*
 * This file is a part of MaintenanceBundle a touchdesign project.
 *
 * (c) 2020 Christin Gruber
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Touchdesign\MaintenanceBundle\Exception;

use Symfony\Component\HttpKernel\Exception\HttpException;

class MaintenanceException extends HttpException
{
    /**
     * @param string     $message    The internal exception message
     * @param int        $statusCode Http status code
     * @param \Throwable $previous   The previous exception
     * @param int        $code       The internal exception code
     */
    public function __construct(string $message = null, int $statusCode = 503, \Throwable $previous = null, int $code = 0, array $headers = [])
    {
        if (null === $message) {
            $message = 'This app is currently in maintenance mode.';
        }

        parent::__construct(503, $message, $previous, $headers, $code);
    }
}
