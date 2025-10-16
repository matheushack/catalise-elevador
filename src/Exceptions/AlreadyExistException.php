<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 *
 */
class AlreadyExistException extends \Exception
{
    /**
     * @var string
     */
    public $message = "Já existe um chamado idêntico na fila";
}