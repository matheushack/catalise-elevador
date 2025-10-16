<?php

namespace App\Exceptions;

class AlreadyExistException extends \Exception
{
    public $message = "Já existe um chamado idêntico na fila";
}