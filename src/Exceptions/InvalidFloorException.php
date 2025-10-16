<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 *
 */
class InvalidFloorException extends \Exception
{
    /**
     * @var string
     */
    public $message = "Andar inválido. Use um valor maior ou igual a 0.";
}