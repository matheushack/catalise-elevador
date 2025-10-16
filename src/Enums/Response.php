<?php
declare(strict_types=1);

namespace App\Enums;

/**
 *
 */
enum Response: string
{
    case INFO = 'INFO';

    case WARNING = 'ALERTA';

    case ERROR = 'ERRO';
}