<?php

namespace App\Exceptions;

class NoPendingException extends \Exception
{
    public $message = "Não há chamados pendentes.";
}