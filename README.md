# Projeto Join-Test

Este projeto é composto por um **backend** desenvolvido em **Laravel 10** e um **frontend** em **Next.js**, ambos orquestrados utilizando **Docker** e **Docker Compose**.

## Estrutura de Pastas

- **backend/**: Contém o código-fonte do Laravel.
- **frontend/**: Contém o código-fonte do Next.js.
- **nginx/**: Contém as configurações do Nginx.
- **docker-compose.yml**: Arquivo de configuração para o Docker Compose.

## Pré-requisitos

Antes de iniciar, certifique-se de ter instalado:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)
- [Git](https://git-scm.com/)

## Configuração Inicial

1. **Clonar o Repositório**

   ```bash
   git clone https://github.com/RodrigoBCastro/join-test.git
   cd join-test
   ```

2. **Configurar Variáveis de Ambiente**

   No diretório `backend/`, copie o arquivo `.env.example` para `.env`:

   ```bash
   cp backend/.env.example backend/.env
   ```

   No diretório `frontend/`, copie o arquivo `.example.env.local` para `.env.local`:

   ```bash
   cp frontend/.example.env.local frontend/.env.local
   ```

   **Nota**: Verifique as variáveis de ambiente no `.env` e `.env.local` e ajuste conforme necessário.


3. **Instalar Dependências**

   Execute o seguintes comandos para instalar  e subir todo o projeto:

   ```bash
   docker compose up -d --build
   ```


## Executando Migrações

Após os containers estarem em execução, execute as migrações e criar as tabelas no banco:

```bash
docker compose exec -it app php artisan migrate
```

## Acessando a Aplicação

- **Frontend**: Acesse `http://localhost:3000` no seu navegador.
- **Backend**: A API estará disponível em `http://localhost:8082/api`.

## Comandos Úteis

- **Parar os Containers**:

  ```bash
  docker compose stop
  ```

- **Acessar o Container do Backend**:

  ```bash
  docker compose exec -it app bash
  ```

## Documentação da API

Para facilitar a visualização dos endpoints da API, foi gerada uma documentação no formato de collection do Postman.

A collection pode ser encontrada no diretório:

```
backend/storage/api-docs
```

Importe esse arquivo no Postman para testar os endpoints disponíveis.