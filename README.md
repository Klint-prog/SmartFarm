<p align="center">
  <img src="./SmartFarm-Logo.png" alt="SmartFarm Logo" width="320"/>
</p>

<h1 align="center">SmartFarm</h1>

<p align="center">
  <strong>🇧🇷 Gestão Inteligente, Colheitas Melhores &nbsp;|&nbsp; 🇺🇸 Smart Management, Better Harvests</strong>
</p>

<p align="center">
  <a href="#-sobre-o-projeto--about-the-project">PT-BR</a> •
  <a href="#about-the-project">EN</a> •
  <a href="#-tecnologias--tech-stack">Stack</a> •
  <a href="#-funcionalidades--features">Features</a> •
  <a href="#-como-executar--getting-started">Setup</a> •
  <a href="#-arquitetura--architecture">Arquitetura</a> •
  <a href="#-licença--license">License</a>
</p>

<p align="center">
  <img alt="PHP" src="https://img.shields.io/badge/PHP-7.0%2B-777BB4?style=flat-square&logo=php&logoColor=white"/>
  <img alt="Symfony" src="https://img.shields.io/badge/Symfony-3.3-000000?style=flat-square&logo=symfony&logoColor=white"/>
  <img alt="MySQL" src="https://img.shields.io/badge/MySQL-5.6-4479A1?style=flat-square&logo=mysql&logoColor=white"/>
  <img alt="Docker" src="https://img.shields.io/badge/Docker-ready-2496ED?style=flat-square&logo=docker&logoColor=white"/>
  <img alt="MQTT" src="https://img.shields.io/badge/IoT-MQTT-660066?style=flat-square"/>
  <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/Klint-prog/SmartFarm?color=2ea44f&style=flat-square"/>
  <img alt="License" src="https://img.shields.io/github/license/Klint-prog/SmartFarm?color=1b5e20&style=flat-square"/>
  <img alt="Status" src="https://img.shields.io/badge/status-ativo%20%2F%20active-brightgreen?style=flat-square"/>
</p>

---

## 🇧🇷 Sobre o Projeto

**SmartFarm** é uma plataforma de gestão agrícola inteligente que integra controle de fazendas, áreas, plantios, tarefas, inventário e dispositivos IoT em um único painel web. A plataforma permite ao produtor rural gerenciar toda a operação — do campo ao dashboard — com leituras de sensores em tempo real via protocolo MQTT.

> Este repositório é um fork ativamente mantido do projeto original [Tania (Tanibox)](https://github.com/tanibox/tania), com nova identidade visual, correções, melhorias e roadmap de modernização.

## 🇺🇸 About the Project

**SmartFarm** is a precision agriculture management platform integrating farm control, areas, crop tracking, task management, inventory, and IoT devices in a single web dashboard. It allows farmers to manage their entire operation — from the field to the dashboard — with real-time sensor readings via the MQTT protocol.

> This repository is an actively maintained fork of the original [Tania (Tanibox)](https://github.com/tanibox/tania) project, with new visual identity, fixes, improvements, and a modernization roadmap.

---

## 🧩 Funcionalidades / Features

| Módulo | Descrição / Description |
|--------|------------------------|
| 🏠 **Dashboard** | Painel geral com stats e leituras IoT em tempo real / Overview panel with real-time IoT stats |
| 🌾 **Fazendas** | Cadastro e gestão de fazendas (Fields) / Farm registration and management |
| 📐 **Áreas** | Subdivisão de fazendas em áreas de cultivo / Subdivision of farms into crop areas |
| 🌱 **Plantas** | Registro de plantios, acompanhamento e colheita / Crop planting, tracking and harvest |
| 🗂️ **Inventário** | Gestão de sementes e categorias / Seed and category management |
| ✅ **Tarefas** | Criação e acompanhamento de tarefas por área / Task creation and tracking per area |
| 💧 **Reservatórios** | Controle de reservatórios d'água por área / Water reservoir control per area |
| 📡 **Dispositivos IoT** | Cadastro de sensores, recursos e vinculação com áreas via MQTT / Sensor registration and MQTT area linking |
| ⚙️ **Configurações** | Configurações gerais da plataforma / Platform general settings |
| 👤 **Usuários** | Autenticação, registro, perfil e recuperação de senha / Auth, registration, profile, password reset |

---

## 🛠️ Tecnologias / Tech Stack

| Camada / Layer | Tecnologia / Technology |
|---|---|
| **Backend** | PHP 7.0+ + Symfony 3.3 |
| **ORM** | Doctrine ORM 2.5 + Doctrine Migrations |
| **Banco de Dados** | MySQL 5.6 |
| **Autenticação** | FOSUserBundle ~2.0 |
| **Templates** | Twig 1.x / 2.x |
| **Frontend** | Bootstrap 3 + jQuery + jQuery UI |
| **IoT / MQTT** | Paho MQTT JS (browser client) |
| **Upload** | VichUploaderBundle |
| **Email** | SwiftMailer |
| **Testes** | PHPUnit 6.2 |
| **Containerização** | Docker + Nginx |

---

## 📁 Estrutura do Projeto / Project Structure

```
SmartFarm/
├── app/
│   ├── config/              # Configurações Symfony (routing, security, services)
│   ├── DoctrineMigrations/  # 10 migrations do banco de dados
│   └── Resources/views/     # Templates Twig por módulo
│
├── src/AppBundle/
│   ├── Controller/          # 11 controllers (lógica de negócio)
│   ├── Entity/              # 12 entidades Doctrine (modelos de dados)
│   ├── Form/                # 12 formulários Symfony
│   ├── Repository/          # Queries customizadas
│   └── DataFixtures/        # Seeds para ambiente de desenvolvimento
│
├── web/
│   ├── assets/              # CSS, JS, fontes, imagens
│   └── uploads/             # Arquivos enviados pelos usuários
│
├── tests/                   # Testes funcionais (8 controllers)
├── docker/                  # Dockerfile + Nginx config
├── docker-compose.yml       # Ambiente de produção
└── docker-compose.dev.yml   # Ambiente de desenvolvimento
```

> 📄 Veja a documentação completa da arquitetura em [`ARCHITECTURE.md`](./ARCHITECTURE.md)

---

## 🗺️ Rotas Principais / Main Routes

| Rota | Módulo |
|------|--------|
| `/` | Dashboard |
| `/farms` | Fazendas |
| `/areas` | Áreas |
| `/plants` | Plantas |
| `/inventories` `/seeds` | Inventário |
| `/tasks` | Tarefas |
| `/reservoirs` | Reservatórios |
| `/devices` | Dispositivos IoT |
| `/settings` | Configurações |
| `/login` `/register` | Autenticação |

---

## 🚀 Como Executar / Getting Started

### Pré-requisitos / Prerequisites

- Docker + Docker Compose
- **ou** PHP >= 7.0 + Composer + MySQL 5.6

---

### 🐳 Com Docker (recomendado / recommended)

```bash
# 1. Clone o repositório
git clone https://github.com/Klint-prog/SmartFarm.git
cd SmartFarm

# 2. Copie e configure as variáveis de ambiente
cp .env-example .env
# Edite o .env com suas credenciais

# 3. Suba os containers
docker-compose -f docker-compose.dev.yml up --build

# 4. Em outro terminal, rode as migrations
docker exec -it smartfarm_app php bin/console doctrine:migrations:migrate

# 5. (Opcional) Carregue dados de exemplo
docker exec -it smartfarm_app php bin/console doctrine:fixtures:load

# Acesse: http://localhost
```

---

### 💻 Sem Docker (manual)

```bash
# 1. Clone e instale dependências PHP
git clone https://github.com/Klint-prog/SmartFarm.git
cd SmartFarm
composer install

# 2. Configure o banco de dados em app/config/parameters.yml
# (gerado automaticamente pelo composer install)

# 3. Crie o banco e rode as migrations
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

# 4. (Opcional) Dados de exemplo
php bin/console doctrine:fixtures:load

# 5. Suba o servidor
php bin/console server:run

# Acesse: http://localhost:8000
```

---

## 🌍 Variáveis de Ambiente / Environment Variables

```env
SYMFONY_LOCALE=pt_BR
SYMFONY_SECRET=sua_chave_secreta_aqui
SYMFONY_ENV=dev

# Banco de dados
SYMFONY_DB_HOST=localhost
SYMFONY_DB_PORT=3306
SYMFONY_DB_NAME=smartfarm
SYMFONY_DB_USERNAME=smartfarm
SYMFONY_DB_PASSWORD=sua_senha

# Email (para recuperação de senha)
SYMFONY_MAILER_TRANSPORT=smtp
SYMFONY_MAILER_HOST=smtp.gmail.com
SYMFONY_MAILER_USERNAME=seu@email.com
SYMFONY_MAILER_PASSWORD=sua_senha
SYMFONY_MAILER_FROM_ADDRESS=seu@email.com
SYMFONY_MAILER_SENDER_NAME=SmartFarm
```

---

## 🏗️ Arquitetura / Architecture

O sistema segue o padrão **MVC** do Symfony com as seguintes camadas:

```
Browser / App Mobile
       │
       ▼
  Twig Templates  ◄──  Controllers  ──►  Doctrine ORM  ──►  MySQL
                            │
                            ▼
                     MQTT (Paho JS)  ◄──►  Dispositivos IoT
```

A integração IoT funciona via **MQTT no browser**: o cliente Paho JS se conecta ao broker MQTT e recebe leituras dos sensores em tempo real, exibidas no dashboard.

> Para detalhes completos de entidades, rotas, migrations e roadmap de modernização, consulte [`ARCHITECTURE.md`](./ARCHITECTURE.md).

---

## 🔄 Roadmap

- [x] Gestão de fazendas e áreas
- [x] Controle de plantios e colheitas
- [x] Inventário de sementes
- [x] Gestão de tarefas
- [x] Integração IoT via MQTT
- [x] Controle de reservatórios
- [ ] Atualização para Symfony 6.x + PHP 8.2
- [ ] API REST com autenticação JWT
- [ ] Frontend moderno (Next.js / React)
- [ ] App mobile (React Native)
- [ ] Broker MQTT dedicado (Mosquitto)
- [ ] Séries temporais para dados de sensores
- [ ] Notificações push e alertas automáticos
- [ ] Suporte multilíngue completo (PT-BR + EN)

---

## 🧪 Testes / Tests

```bash
# Rodar todos os testes
php bin/phpunit

# Com Docker
docker exec -it smartfarm_app php bin/phpunit
```

Cobertura atual: `AreaController`, `DashboardController`, `DeviceController`, `FieldController`, `InventoryController`, `PlantController`, `ReservoirController`, `TaskController`

---

## 🤝 Contribuindo / Contributing

### 🇧🇷
Contribuições são muito bem-vindas! Este projeto está ativamente mantido.

1. Faça um **fork** do projeto
2. Crie uma branch: `git checkout -b feature/minha-feature`
3. Faça commit: `git commit -m 'feat: adiciona minha feature'`
4. Push: `git push origin feature/minha-feature`
5. Abra um **Pull Request** para o branch `development`

Siga o padrão [Conventional Commits](https://www.conventionalcommits.org/).

### 🇺🇸
Contributions are very welcome! This project is actively maintained.

1. **Fork** the project
2. Create your branch: `git checkout -b feature/my-feature`
3. Commit: `git commit -m 'feat: add my feature'`
4. Push: `git push origin feature/my-feature`
5. Open a **Pull Request** to the `development` branch

Please follow [Conventional Commits](https://www.conventionalcommits.org/).

---

## 📄 Licença / License

Distribuído sob a licença **Apache 2.0** (herdada do projeto original Tania).  
Distributed under the **Apache 2.0** License (inherited from the original Tania project).

Veja [`LICENSE`](./LICENSE) para mais detalhes.

---

## 👤 Autor / Author

Fork desenvolvido e mantido por / Fork developed and maintained by:  
**Klint-prog** — [github.com/Klint-prog](https://github.com/Klint-prog)

Projeto original / Original project: [Tanibox/Tania](https://github.com/tanibox/tania)

---

<p align="center">
  Feito com 💚 para o agro brasileiro.<br/>
  Made with 💚 for Brazilian agriculture.
</p>
