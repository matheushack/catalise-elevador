<?php

namespace App\Exceptions;

class InvalidFloorException extends \Exception
{
    public $message = "Andar inválido. Use um valor maior ou igual a 0.";
}