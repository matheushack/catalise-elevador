<?php
declare(strict_types=1);

namespace App;

use App\Traits\Message;
use SplQueue;
use Exception;
use App\Enums\Response;
use App\Exceptions\NoPendingException;
use App\Exceptions\AlreadyExistException;
use App\Exceptions\InvalidFloorException;
use App\Exceptions\MaximumCapacityException;

/**
 *
 */
final class Elevador
{
    use Message;

    /**
     * @var SplQueue
     */
    private SplQueue $filaChamados;

    /**
     * @var int
     */
    private int $andarAtual = 0;

    /**
     * @var int
     */
    private int $capacidade;

    /**
     * @param int $capacidade
     */
    public function __construct(int $capacidade)
    {
        if ($capacidade <= 0) {
            $this->message(Response::ERROR, 'A capacidade deve ser maior que 0', true);
        }

        $this->capacidade = $capacidade;
        $this->filaChamados = new SplQueue();
    }

    /**
     * @return int
     */
    public function getAndarAtual(): int
    {
        return $this->andarAtual;
    }

    /**
     * @return SplQueue
     */
    public function getChamadosPendentes(): SplQueue
    {
        return clone $this->filaChamados;
    }

    /**
     * @param int $andar
     * @return void
     */
    public function chamar(int $andar): void
    {
        try {
            $this->validate($andar);
            $this->filaChamados->enqueue($andar);
        } catch (InvalidFloorException|MaximumCapacityException|AlreadyExistException $e) {
            $this->message(Response::WARNING, $e->getMessage());
        } catch (Exception $e) {
            $this->message(Response::ERROR, "Ocorreu um erro no processo de chamar o elevador.");
        }
    }

    /**
     * @return void
     */
    public function mover(): void
    {
        try {
            if ($this->filaChamados->isEmpty()) {
                throw new NoPendingException();
            }

            $proximoAndar = $this->filaChamados->dequeue();
            $origem = $this->andarAtual;

            $this->message(Response::INFO, "Saindo do andar {$origem} em direção ao andar {$proximoAndar}");

            $this->andarAtual = $proximoAndar;

            $this->message(Response::INFO, "Chegamos ao andar {$this->andarAtual}");
        } catch (NoPendingException $e) {
            $this->message(Response::WARNING, $e->getMessage());
        } catch (Exception $e) {
            $this->message(Response::ERROR, "Ocorreu um erro no processo de movimentar o elevador.");
        }
    }

    /**
     * @param int $andar
     * @throws AlreadyExistException
     * @throws InvalidFloorException
     * @throws MaximumCapacityException
     */
    protected function validate(int $andar): void
    {
        if ($andar < 0) {
            throw new InvalidFloorException();
        }

        if (!$this->filaChamados->isEmpty()) {
            $last = $this->filaChamados->top();
            if ($last === $andar) {
                throw new AlreadyExistException("Já existe um chamado idêntico na fila com o andar {$andar}");
            }
        }

        if ($this->filaChamados->count() >= $this->capacidade) {
            throw new MaximumCapacityException();
        }
    }
}
