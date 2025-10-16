<?php
declare(strict_types=1);

namespace App\Exceptions;

/**
 *
 */
class NoPendingException extends \Exception
{
    /**
     * @var string
     */
    public $message = "Não há chamados pendentes.";
}