<?php

namespace App\Traits;

use App\Enums\Response;

trait Message
{
    /**
     * @param Response $tag
     * @param $message
     * @param bool $exit
     * @return void
     */
    public static function message(Response $tag, $message, bool $exit = false): void
    {
        echo sprintf("[%s] %s.\n", $tag->value, $message);
        if ($exit) {
            exit();
        }
    }
}