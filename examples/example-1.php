<?php
declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Elevador;
use App\Enums\Response;

$elevador = new Elevador(8);

$elevador->chamar(1);
$elevador->chamar(2);
$elevador->chamar(3);
$elevador->chamar(4);
$elevador->chamar(5);
$elevador->chamar(6);
$elevador->chamar(7);
$elevador->chamar(8);

$pendentes = $elevador->getChamadosPendentes();
if(!$pendentes->isEmpty()) {
    for ($i = 0; $i < $pendentes->count(); $i++) {
        Elevador::message(Response::INFO, "Andar atual: {$elevador->getAndarAtual()}");
        Elevador::message(Response::INFO, "Chamados pendentes: {$elevador->getChamadosPendentes()->count()}");
        $elevador->mover();
    }
}