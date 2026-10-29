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
`database/init/01-crud_clientes.sql` apenas na primeira criação do volume.

## Estrutura do projeto

```text
.
├── public/                 # Páginas e arquivos acessíveis pelo navegador
│   └── assets/css/         # Folhas de estilo
├── src/                    # Código interno da aplicação
│   ├── Database/           # Configuração e conexão com o banco
│   └── Support/            # Funções auxiliares
├── database/init/          # SQL executado na criação do banco
├── Dockerfile
└── compose.yaml
```

Para executar sem Docker, configure as variáveis de banco e use `public/`
como raiz do servidor web. Por exemplo:

```bash
php -S localhost:8080 -t public
```

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
