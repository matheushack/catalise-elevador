<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 *
 */
class MaximumCapacityException extends \Exception
{
    /**
     * @var string
     */
    public $message = "Capacidade máxima atingida";
}