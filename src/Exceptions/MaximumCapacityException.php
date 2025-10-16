<?php

namespace App\Exceptions;

class MaximumCapacityException extends \Exception
{
    public $message = "Capacidade máxima atingida";
}