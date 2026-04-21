# 🏗️ SmartFarm — Engenharia Reversa / Reverse Engineering

> Documento gerado a partir da análise do código-fonte do fork `Klint-prog/SmartFarm`  
> Based on source analysis of fork `Klint-prog/SmartFarm`

---

## 📦 Stack Tecnológica Real / Actual Tech Stack

| Camada / Layer       | Tecnologia / Technology              |
|----------------------|--------------------------------------|
| **Linguagem**        | PHP >= 7.0                           |
| **Framework**        | Symfony 3.3                          |
| **ORM**              | Doctrine ORM 2.5 + Migrations        |
| **Banco de Dados**   | MySQL 5.6                            |
| **Autenticação**     | FOSUserBundle ~2.0                   |
| **Templates**        | Twig 1.x / 2.x                       |
| **Frontend**         | Bootstrap 3 + jQuery + jQuery UI     |
| **IoT**              | MQTT via Paho JS (paho-mqtt.js)      |
| **Upload**           | VichUploaderBundle 1.4               |
| **Email**            | SwiftMailer                          |
| **Testes**           | PHPUnit 6.2                          |
| **Containerização**  | Docker + Nginx                       |
| **Assets**           | Bower (bootstrap, select2)           |

---

## 🗂️ Estrutura de Diretórios / Directory Structure

```
SmartFarm/
├── app/
│   ├── AppKernel.php            # Registro de bundles Symfony
│   ├── AppCache.php             # Cache HTTP
│   ├── config/
│   │   ├── config.yml           # Config principal
│   │   ├── config_dev.yml       # Config ambiente dev
│   │   ├── config_prod.yml      # Config ambiente produção
│   │   ├── routing.yml          # ⭐ Todas as rotas da aplicação
│   │   ├── security.yml         # Firewalls e controle de acesso
│   │   ├── services.yml         # Injeção de dependência
│   │   └── repository.yml       # Config de repositórios
│   ├── DoctrineMigrations/      # 10 migrations (2017)
│   └── Resources/
│       ├── FOSUserBundle/views/ # Auth: login, registro, perfil, senha
│       └── views/               # Templates Twig por módulo
│
├── src/AppBundle/
│   ├── Controller/              # ⭐ Lógica de negócio (11 controllers)
│   ├── Entity/                  # ⭐ Modelos de dados (12 entidades)
│   ├── Form/                    # Formulários Symfony (12 types)
│   ├── Repository/              # Queries customizadas (3 repos)
│   ├── Data/                    # Dados estáticos (categorias, países)
│   ├── DataFixtures/            # Seeds do banco (usuário, recursos, sementes)
│   └── DoctrineExtensions/      # Extensão AnyValue para MySQL
│
├── web/
│   ├── app.php                  # Front controller
│   ├── assets/
│   │   ├── css/                 # Bootstrap, Material Icons, Select2, tania.css
│   │   ├── js/                  # jQuery, Bootstrap, MQTT, area.js, plant.js...
│   │   └── lib/                 # Fontes Roboto
│   └── uploads/                 # Uploads de arquivos (areas, fields, seeds)
│
├── tests/AppBundle/Controller/  # Testes funcionais (8 controllers)
├── docker/app/                  # Dockerfile + Nginx config
├── docker-compose.yml           # Produção
├── docker-compose.dev.yml       # Desenvolvimento
└── var/                         # Cache, logs, sessões
```

---

## 🗺️ Mapa de Rotas / Route Map

### Dashboard
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/` | GET | `Dashboard:index` | Painel principal |
| `/iot/area/{id}` | GET | `Dashboard:iot` | Stats IoT por área |

### Farms (Fazendas)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/farms` | GET | `Field:index` | Lista fazendas |
| `/farms/create` | GET, POST | `Field:create` | Cria fazenda |
| `/farms/{id}` | GET, POST | `Field:show` | Detalhe da fazenda |
| `/farms/{id}/session` | GET | `Field:session` | Sessão da fazenda |

### Areas (Áreas)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/areas` | GET | `Area:index` | Lista áreas |
| `/areas/{id}` | GET | `Area:show` | Detalhe da área |
| `/areas/create` | GET, POST | `Area:create` | Cria área |
| `/areas/{id}/edit` | GET, POST | `Area:edit` | Edita área |

### Plants (Plantas)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/plants` | GET | `Plant:index` | Lista plantas |
| `/plants/create` | GET, POST | `Plant:create` | Registra plantio |
| `/plants/{id}` | GET, POST | `Plant:show` | Detalhe da planta |
| `/plants/{id}/harvest` | GET, POST | `Plant:harvest` | Registra colheita |
| `/plants/{id}/edit` | GET, POST | `Plant:edit` | Edita planta |

### Inventory / Seeds (Sementes)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/inventories` | GET | `Inventory:index` | Inventário geral |
| `/seeds/create` | GET, POST | `Inventory:seedCreate` | Cadastra semente |
| `/seeds/{id}` | GET, POST | `Inventory:seedEdit` | Edita semente |

### Tasks (Tarefas)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/tasks` | GET | `Task:index` | Lista tarefas |
| `/tasks/create` | GET, POST | `Task:create` | Cria tarefa |
| `/tasks/{id}` | GET, POST | `Task:show` | Detalhe/atualiza tarefa |

### Devices (Dispositivos IoT)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/devices` | GET | `Device:index` | Lista dispositivos |
| `/devices/create` | GET, POST | `Device:create` | Cadastra dispositivo |
| `/devices/{id}` | GET | `Device:show` | Detalhe do dispositivo |
| `/devices/{id}` | DELETE | `Device:delete` | Remove dispositivo |
| `/devices/{id}/resources` | GET, POST | `Device:resources` | Gerencia recursos |
| `/devices/{id}/resources` | DELETE | `Device:resourcesDelete` | Remove recurso |
| `/devices/{id}/areas` | GET, POST | `Device:areas` | Vincula áreas |
| `/devices/{id}/areas` | DELETE | `Device:areasDelete` | Desvincula área |

### Reservoirs (Reservatórios)
| Rota | Método | Controller | Descrição |
|------|--------|-----------|-----------|
| `/reservoirs` | GET, POST | `Reservoir:index` | Lista/cria reservatórios |
| `/reservoirs/{id}` | GET, POST | `Reservoir:show` | Detalhe/atualiza |

### Auth (FOSUserBundle)
| Rota | Descrição |
|------|-----------|
| `/login` | Login |
| `/register` | Cadastro |
| `/profile` | Perfil do usuário |
| `/profile/edit` | Editar perfil |
| `/resetting/request` | Recuperação de senha |

### Settings
| Rota | Método | Descrição |
|------|--------|-----------|
| `/settings` | GET, POST | Configurações gerais |

---

## 🧬 Entidades / Domain Entities

### `User`
- Estende FOSUserBundle
- Campos: username, email, password, roles

### `Field` (Fazenda)
- id, name, image, location, createdAt
- Relação: tem muitas `Area`

### `Area`
- id, name, size, unit, type, photo, Field (FK)
- Relação: pertence a `Field`, tem muitos `Plant`, `Device`, `Reservoir`

### `Plant`
- id, name, status, quantity, area (FK), seed (FK)
- Registra plantio → crescimento → colheita

### `Seed` (Semente/Inventário)
- id, name, plantType, additionalInfo, photo, category (FK)
- Upload de foto via VichUploaderBundle

### `SeedCategory`
- id, name (ex: vegetable, herb, fruit)

### `Task`
- id, title, description, dueDate, status, priority, area (FK)

### `Device` (IoT)
- id, name, status, nodeId, externalId
- Relação N:N com `Area` via `AreasDevices`
- Relação N:N com `Resource` via `ResourcesDevices`

### `Resource`
- id, name, unit (dados dos sensores: temperatura, umidade etc.)

### `AreasDevices`
- Tabela pivot: Area ↔ Device

### `ResourcesDevices`
- Tabela pivot: Resource ↔ Device (com valor atual do sensor)

### `Reservoir`
- id, name, capacity, currentVolume, area (FK)

### `Setting`
- id, key, value (configurações gerais da aplicação)

---

## 🔌 Integração IoT / IoT Integration

A comunicação IoT usa o protocolo **MQTT** via biblioteca **Paho JS** no browser:

```
Sensor/Device  →  MQTT Broker  →  paho-mqtt.js  →  Dashboard Web
```

- `web/assets/js/paho-mqtt.js` — cliente MQTT no browser
- `web/assets/js/dashboard.js` — subscrição aos tópicos MQTT
- Rota `/iot/area/{id}` — retorna stats atuais de uma área
- `ResourcesDevices` — armazena leituras dos sensores no banco

---

## 🧪 Cobertura de Testes / Test Coverage

Testes funcionais (WebTestCase) existem para:
- `AreaControllerTest`
- `DashboardControllerTest`
- `DeviceControllerTest`
- `FieldControllerTest`
- `InventoryControllerTest`
- `PlantControllerTest`
- `ReservoirControllerTest`
- `TaskControllerTest`

---

## 🗃️ Banco de Dados / Database

**MySQL 5.6** — 10 migrations Doctrine (Jul–Out 2017)

Ordem das migrations:
1. `20170701083607` — Estrutura inicial
2. `20170701083839` — ...
3. `20170907000538` — Devices
4. `20170914142257` — Resources
5. `20170915083636` — AreasDevices
6. `20170918155155` — ResourcesDevices
7. `20170930124648` — Reservoirs
8. `20170930171444` — Settings
9. `20171003083933` — SeedCategory
10. `20171004065248` — Ajustes finais

---

## 🚦 Variáveis de Ambiente / Environment Variables

```env
SYMFONY_LOCALE=pt_BR
SYMFONY_SECRET=your_secret_here
SYMFONY_ENV=dev

# Banco de dados
SYMFONY_DB_HOST=db
SYMFONY_DB_PORT=3306
SYMFONY_DB_NAME=smartfarm
SYMFONY_DB_USERNAME=smartfarm
SYMFONY_DB_PASSWORD=your_password

# Email
SYMFONY_MAILER_TRANSPORT=smtp
SYMFONY_MAILER_HOST=smtp.gmail.com
SYMFONY_MAILER_USERNAME=your@email.com
SYMFONY_MAILER_PASSWORD=your_password
SYMFONY_MAILER_FROM_ADDRESS=your@email.com
SYMFONY_MAILER_SENDER_NAME=SmartFarm
```

---

## 🔄 Roadmap de Modernização / Modernization Roadmap

### Fase 1 — Estabilização (PHP/Symfony)
- [ ] Atualizar Symfony 3.3 → 6.x (LTS)
- [ ] PHP 7.0 → 8.2+
- [ ] Substituir FOSUserBundle por Symfony Security nativo
- [ ] Atualizar Doctrine Migrations
- [ ] Trocar Bower por npm/webpack

### Fase 2 — API REST
- [ ] Expor endpoints REST/JSON para todas as entidades
- [ ] Adicionar autenticação JWT (LexikJWTBundle)
- [ ] Documentar API com OpenAPI/Swagger

### Fase 3 — Frontend Moderno
- [ ] Migrar templates Twig → Next.js / React
- [ ] Dashboard em tempo real com WebSocket ou SSE
- [ ] App mobile com React Native

### Fase 4 — IoT Avançado
- [ ] Broker MQTT dedicado (Mosquitto / HiveMQ)
- [ ] Persistência de séries temporais (InfluxDB ou TimescaleDB)
- [ ] Alertas automáticos por limites de sensores

---

*Documento gerado em Abril/2026 — SmartFarm fork mantido por Klint-prog*
