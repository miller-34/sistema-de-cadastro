# Sistema de cadastro

CRUD de clientes desenvolvido em PHP e MariaDB.

## Executar com Docker

Requisitos: Docker com o plugin Docker Compose.

1. Opcionalmente, copie `.env.example` para `.env` e altere a porta e as senhas.
2. Construa e inicie os containers:

   ```bash
   docker compose up --build -d
   ```

3. Acesse [http://localhost:8080](http://localhost:8080). Se você alterar
   `APP_PORT`, use a porta configurada.

O MariaDB é inicializado automaticamente com o conteúdo de
`crud_clientes.sql` apenas na primeira criação do volume.

Para acompanhar os logs:

```bash
docker compose logs -f
```

Para parar a aplicação sem apagar os dados:

```bash
docker compose down
```

Para parar e também remover o banco persistido:

```bash
docker compose down -v
```
