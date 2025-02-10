# BrunoCars - Sistema de Gerenciamento de Locação de Veículos

Uma aplicação web para gerenciar locadoras de veículos e exibir veículos disponíveis. O sistema inclui uma API RESTful backend e uma interface frontend simples em Vue.js.

## Visão Geral

O sistema permite:
- Gerenciamento de locadoras via API (operações CRUD)
- Exibição de veículos disponíveis de múltiplas locadoras
- Consulta a APIs externas para buscar disponibilidade de veículos
- Apresentação unificada das informações de locação

## Stack Tecnológico

### Backend
- PHP 8.3
- Laravel 11
- MySQL 8.3
- Docker

### Frontend
- Vue.js 3
- Bootstrap 5
- Vite
- Docker

### Infraestrutura
- Nginx
- Docker Compose
- JSON Server (para APIs mockadas)

## Instalação

1. Clone o repositório:
```bash
git clone https://github.com/bruno-groth/BrunoCars.git
cd BrunoCars
```

2. Configure as variáveis de ambiente:

```bash
cp backend/.env.example backend/.env
```
3. Inicie os containers Docker:
```bash
docker-compose up -d --build
```

4. Instale as dependências e execute as migrações:

```bash
docker exec api composer install
docker exec api php artisan migrate
```

## Documentação da API

### Endpoints de Locadoras

| Método | Endpoint              | Descrição                 |
|--------|-----------------------|---------------------------|
| GET    | `/api/locadoras`      | Listar todas as locadoras |
| POST   | `/api/locadoras`      | Criar nova locadora |
| GET    | `/api/locadoras/{id}` | Obter detalhes da locadora |
| PUT    | `/api/locadoras/{id}` | Atualizar locadora |
| DELETE | `/api/locadoras/{id}` | Excluir locadora |
| GET    | `/api/pesquisa`       | Obter veículos disponíveis |

### Exemplo de Resposta (/api/pesquisa)
```json
{
  "data": [
    {
      "rental": {
        "id": 1,
        "name": "Movami",
        "address": "Endereço Exemplo",
        "phone": "+55123456789"
      },
      "vehicles": [
        {
          "nome": "Chevrolet Onix",
          "categoria": "Econômico",
          "preco": 120
        }
      ]
    }
  ]
}
```

## Estrutura do Projeto

```
BrunoCars/
    backend/           # API Laravel
    frontend/          # Frontend Vue.js
    nginx/            # Configuração Nginx
    json-api/         # Servidor API JSON mockado
    docker-compose.yml
```

## Funcionalidades Atendidas

- [x] CRUD completo para locadoras
- [x] Integração de pesquisa de veículos
- [x] Interface frontend responsiva
- [x] Containerização com Docker
- [x] Sistema de mock de API
