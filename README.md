## 📄 6. README.md

**Arquivo:** `README.md`

```markdown
# 🦸 API de Heróis da Marvel - Laravel

API RESTful para cadastro e gerenciamento de heróis da Marvel, desenvolvida em Laravel com SQLite.

## 🚀 Tecnologias

- Laravel 11.x
- PHP 8.2+
- SQLite 3
- Postman (para testes)

## 📋 Pré-requisitos

- XAMPP com PHP 8.2
- Composer
- Git
- Postman

## 🔧 Instalação

### 1. Clonar o repositório

```bash
git clone https://github.com/emersonlsg10/workshop-ifma-marvel-heroes.git
cd workshop-ifma-marvel-heroes
```

### 2. Instalar dependências

```bash
composer install
```

### 3. Configurar ambiente

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Criar banco de dados SQLite

**No PowerShell:**
```powershell
New-Item database/database.sqlite
```

**No CMD:**
```cmd
type nul > database\database.sqlite
```

### 5. Executar migrations

```bash
php artisan migrate
```

### 6. Iniciar servidor

```bash
php artisan serve
```

A API estará disponível em: `http://localhost:8000`

## 📍 Endpoints da API

### Listar todos os heróis
```http
GET /api/heroes
```

**Parâmetros opcionais:**
- `classificacao`: Filtrar por classificação
- `busca`: Buscar por nome

**Exemplo:**
```http
GET /api/heroes?classificacao=S
GET /api/heroes?busca=thor
```

### Criar novo herói
```http
POST /api/heroes
Content-Type: application/json

{
  "nome": "Homem de Ferro",
  "habilidade": "Gênio tecnológico com armadura avançada",
  "classificacao": "A",
  "ponto_fraco": "Dependência da armadura e ego",
  "filme": "Iron Man (2008)"
}
```

### Buscar herói específico
```http
GET /api/heroes/{id}
```

### Atualizar herói
```http
PUT /api/heroes/{id}
Content-Type: application/json

{
  "classificacao": "S",
  "ponto_fraco": "Ego inflado"
}
```

### Deletar herói
```http
DELETE /api/heroes/{id}
```

## 📊 Estrutura do Banco de Dados

### Tabela: heroes

| Campo | Tipo | Descrição |
|-------|------|-----------|
| id | INTEGER | Chave primária |
| nome | TEXT | Nome do herói |
| habilidade | TEXT | Descrição das habilidades |
| classificacao | TEXT | Classificação (A, B, C, S) |
| ponto_fraco | TEXT | Ponto fraco (opcional) |
| filme | TEXT | Filme principal (opcional) |
| created_at | TIMESTAMP | Data de criação |
| updated_at | TIMESTAMP | Data de atualização |

## 🧪 Testando com Postman

### 1. Criar herói (POST)
```
POST http://localhost:8000/api/heroes
Body (raw JSON):
{
  "nome": "Thor",
  "habilidade": "Deus do Trovão com Mjolnir",
  "classificacao": "S",
  "ponto_fraco": "Orgulho",
  "filme": "Thor (2011)"
}
```

### 2. Listar heróis (GET)
```
GET http://localhost:8000/api/heroes
```

### 3. Buscar herói (GET)
```
GET http://localhost:8000/api/heroes/1
```

### 4. Atualizar herói (PUT)
```
PUT http://localhost:8000/api/heroes/1
Body (raw JSON):
{
  "classificacao": "S+"
}
```

### 5. Deletar herói (DELETE)
```
DELETE http://localhost:8000/api/heroes/1
```

## 🌿 Fluxo de Trabalho com Git

### Criar sua branch
```bash
git checkout -b feature/seu-nome
```

### Fazer commits
```bash
git add .
git commit -m "Descrição das alterações"
```

### Enviar para o GitHub
```bash
git push origin feature/seu-nome
```

### Criar Pull Request
1. Acesse o repositório no GitHub
2. Clique em "Pull Requests"
3. Clique em "New Pull Request"
4. Selecione sua branch
5. Descreva as alterações
6. Crie o Pull Request

## ✅ Validações

Os seguintes campos são obrigatórios:
- `nome`: string, máximo 255 caracteres
- `habilidade`: texto
- `classificacao`: string, máximo 10 caracteres

Campos opcionais:
- `ponto_fraco`: texto
- `filme`: string, máximo 255 caracteres

## 📝 Exemplos de Heróis

```json
[
  {
    "nome": "Homem de Ferro",
    "habilidade": "Gênio tecnológico com armadura avançada",
    "classificacao": "A",
    "ponto_fraco": "Dependência da armadura e ego",
    "filme": "Iron Man (2008)"
  },
  {
    "nome": "Capitão América",
    "habilidade": "Super soldado com escudo indestrutível",
    "classificacao": "S",
    "ponto_fraco": "Humano vulnerável sem o escudo",
    "filme": "Captain America: The First Avenger (2011)"
  },
  {
    "nome": "Thor",
    "habilidade": "Deus do Trovão com Mjolnir",
    "classificacao": "S",
    "ponto_fraco": "Orgulho e impulsividade",
    "filme": "Thor (2011)"
  },
  {
    "nome": "Hulk",
    "habilidade": "Força sobre-humana ilimitada",
    "classificacao": "S",
    "ponto_fraco": "Falta de controle quando enfurecido",
    "filme": "The Incredible Hulk (2008)"
  },
  {
    "nome": "Viúva Negra",
    "habilidade": "Espiã e lutadora de elite",
    "classificacao": "B",
    "ponto_fraco": "Humana sem superpoderes",
    "filme": "Black Widow (2021)"
  }
]
```

## 🚨 Troubleshooting

### Erro: "php não reconhecido"
Adicione o PHP ao PATH do Windows:
1. Abra as variáveis de ambiente
2. Adicione `C:\xampp\php` ao PATH

### Erro: "composer não reconhecido"
Reinstale o Composer e verifique o PATH

### Erro ao criar database.sqlite
Use o comando correto do PowerShell ou CMD

### Porta 8000 em uso
```bash
php artisan serve --port=8001
```

## 📚 Recursos Úteis

- [Documentação Laravel](https://laravel.com/docs)
- [Laravel API Resources](https://laravel.com/docs/eloquent-resources)
- [HTTP Status Codes](https://httpstatuses.com/)
- [REST API Best Practices](https://restfulapi.net/)

## 👥 Contribuindo

1. Faça o fork do projeto
2. Crie sua branch (`git checkout -b feature/MinhaFeature`)
3. Commit suas mudanças (`git commit -m 'Adiciona MinhaFeature'`)
4. Push para a branch (`git push origin feature/MinhaFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT.

## ✨ Autor

Desenvolvido para workshop de ADS
```

---

## 🎯 Comandos para Criar o Projeto do Zero

Se você quiser criar o projeto do zero, siga estes comandos:

```bash
# Criar novo projeto Laravel
composer create-project laravel/laravel marvel-heroes-api
cd marvel-heroes-api

# Criar o Model com Migration
php artisan make:model Hero -m

# Criar o Controller
php artisan make:controller HeroController --resource

# Criar banco SQLite
New-Item database/database.sqlite

# Executar migrations
php artisan migrate

# Iniciar servidor
php artisan serve
```

---

## 📦 Collection do Postman

Importe esta collection no Postman para testar rapidamente:

```json
{
  "info": {
    "name": "Marvel Heroes API",
    "schema": "https://schema.getpostman.com/json/collection/v2.1.0/collection.json"
  },
  "item": [
    {
      "name": "Listar Heróis",
      "request": {
        "method": "GET",
        "header": [],
        "url": {
          "raw": "http://localhost:8000/api/heroes",
          "protocol": "http",
          "host": ["localhost"],
          "port": "8000",
          "path": ["api", "heroes"]
        }
      }
    },
    {
      "name": "Criar Herói",
      "request": {
        "method": "POST",
        "header": [
          {
            "key": "Content-Type",
            "value": "application/json"
          }
        ],
        "body": {
          "mode": "raw",
          "raw": "{\n  \"nome\": \"Thor\",\n  \"habilidade\": \"Deus do Trovão com Mjolnir\",\n  \"classificacao\": \"S\",\n  \"ponto_fraco\": \"Orgulho\",\n  \"filme\": \"Thor (2011)\"\n}"
        },
        "url": {
          "raw": "http://localhost:8000/api/heroes",
          "protocol": "http",
          "host": ["localhost"],
          "port": "8000",
          "path": ["api", "heroes"]
        }
      }
    },
    {
      "name": "Buscar Herói",
      "request": {
        "method": "GET",
        "header": [],
        "url": {
          "raw": "http://localhost:8000/api/heroes/1",
          "protocol": "http",
          "host": ["localhost"],
          "port": "8000",
          "path": ["api", "heroes", "1"]
        }
      }
    },
    {
      "name": "Atualizar Herói",
      "request": {
        "method": "PUT",
        "header": [
          {
            "key": "Content-Type",
            "value": "application/json"
          }
        ],
        "body": {
          "mode": "raw",
          "raw": "{\n  \"classificacao\": \"S+\"\n}"
        },
        "url": {
          "raw": "http://localhost:8000/api/heroes/1",
          "protocol": "http",
          "host": ["localhost"],
          "port": "8000",
          "path": ["api", "heroes", "1"]
        }
      }
    },
    {
      "name": "Deletar Herói",
      "request": {
        "method": "DELETE",
        "header": [],
        "url": {
          "raw": "http://localhost:8000/api/heroes/1",
          "protocol": "http",
          "host": ["localhost"],
          "port": "8000",
          "path": ["api", "heroes", "1"]
        }
      }
    }
  ]
}
```

Salve este JSON como `Marvel_Heroes_API.postman_collection.json` e importe no Postman!