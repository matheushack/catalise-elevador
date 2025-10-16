# Teste Elevador
Implementação simples de elevador que atende chamados em FIFO usando SplQueue.

## Requisitos
- \>= PHP 8.1
- Composer

## Instalação
### Git
```bash
  git clone 
```

### Composer
```bash
  composer dumpautoload
```

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