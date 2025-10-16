# Teste Elevador
Implementação simples de elevador que atende chamados em FIFO usando SplQueue.

## Requisitos
- \>= PHP 8.1
- Composer

## Instalação
### Git
```bash
  git clone https://github.com/matheushack/catalise-elevador.git
```

### Composer
```bash
  composer dumpautoload
```

## Como usar
Para usar o script é bem simples, basta criar um arquivo php com a seguinte estrutura:
```
<?php
// Carregar o autoload da vendor
require __DIR__ . '/vendor/autoload.php';

// Usar a classe principal Elevador e o enum Response para informar a flag na mensagem (info, warning, error)
use App\Elevador;
use App\Enums\Response;

// Instanciar a classe principal, onde o unico parametro é a capacidade máxima de chamadas
$elevador = new Elevador(8);

// Efetuar a quantidade de chamadas que deseja, passando o número do andar
$elevador->chamar(1);
$elevador->chamar(2);
$elevador->chamar(3);

// Após as chamadas, adicionar o fluxo que deseja para mover o elavador entre os andares enfileirados
$elevador->mover();
$elevador->mover();
$elevador->mover();

```

Criado alguns exemplos para que possa guiar de como utilizar o script.

## Exemplos
- Máximo de 8 chamadas
```bash
  php examples/example-1.php
```

- Máximo de 1 uma chamada, porém com mais
```bash
  php examples/example-2.php
```

- Erro de capacidade
```bash
  php examples/example-3.php
```

- Chamadas repetidas em sequência
```bash
  php examples/example-4.php
```