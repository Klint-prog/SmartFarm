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
  <a href="#-licença--license">License</a>
</p>

<p align="center">
  <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/Klint-prog/SmartFarm?color=2ea44f&style=flat-square"/>
  <img alt="GitHub forks" src="https://img.shields.io/github/forks/Klint-prog/SmartFarm?color=4caf50&style=flat-square"/>
  <img alt="GitHub stars" src="https://img.shields.io/github/stars/Klint-prog/SmartFarm?color=66bb6a&style=flat-square"/>
  <img alt="License" src="https://img.shields.io/github/license/Klint-prog/SmartFarm?color=1b5e20&style=flat-square"/>
  <img alt="Status" src="https://img.shields.io/badge/status-ativo%20%2F%20active-brightgreen?style=flat-square"/>
</p>

---

## 🇧🇷 Sobre o Projeto / About the Project

**SmartFarm** é uma plataforma completa de gestão agrícola inteligente que integra **aplicação web**, **app mobile** e **dispositivos IoT** para oferecer ao produtor rural uma visão em tempo real da sua propriedade — do campo ao painel de controle.

O projeto nasceu da necessidade de modernizar e digitalizar a gestão rural, tornando dados de sensores, controle de safras e monitoramento de recursos acessíveis de qualquer lugar.

> Este repositório é um fork ativamente mantido do projeto original, com novas funcionalidades, correções e melhorias contínuas.

---

## 🇺🇸 About the Project

**SmartFarm** is a full-stack precision agriculture platform integrating a **web dashboard**, **mobile app**, and **IoT devices** to give farmers real-time visibility of their entire operation — from the field to the control panel.

The project was born from the need to digitize and modernize rural management, making sensor data, crop tracking, and resource monitoring accessible from anywhere.

> This repository is an actively maintained fork of the original project, with new features, fixes, and continuous improvements.

---

## 🧩 Funcionalidades / Features

### 🇧🇷
- 📊 **Dashboard web** — painel de controle em tempo real com gráficos e alertas
- 📱 **App mobile** — acesso remoto para monitoramento no campo
- 🌡️ **Integração IoT** — leitura de sensores (temperatura, umidade, irrigação)
- 🗺️ **Mapa da propriedade** — visualização geoespacial de talhões
- 📅 **Gestão de safras** — planejamento, histórico e estimativas de colheita
- 💧 **Controle de irrigação** — automação e agendamento inteligente
- 🔔 **Alertas e notificações** — avisos por condições climáticas e leituras críticas
- 🔐 **Autenticação segura** — controle de acesso por perfil (admin, operador, visualizador)

### 🇺🇸
- 📊 **Web Dashboard** — real-time control panel with charts and alerts
- 📱 **Mobile App** — remote access for field monitoring
- 🌡️ **IoT Integration** — sensor readings (temperature, humidity, irrigation)
- 🗺️ **Farm Map** — geospatial visualization of crop zones
- 📅 **Crop Management** — planning, history, and harvest estimates
- 💧 **Irrigation Control** — automation and smart scheduling
- 🔔 **Alerts & Notifications** — weather and critical reading warnings
- 🔐 **Secure Authentication** — role-based access control (admin, operator, viewer)

---

## 🛠️ Tecnologias / Tech Stack

| Camada / Layer | Tecnologia / Technology |
|---|---|
| **Frontend Web** | [Next.js](https://nextjs.org/) + React + Tailwind CSS |
| **Mobile** | React Native / Expo |
| **Backend / API** | Node.js + REST API |
| **Banco de Dados / Database** | PostgreSQL + MongoDB |
| **IoT / Hardware** | MQTT Protocol + Arduino / ESP32 |
| **Auth** | JWT + OAuth2 |
| **Deploy** | Docker + Vercel / Railway |

---

## 📁 Estrutura do Projeto / Project Structure

```
SmartFarm/
├── web/                  # Next.js dashboard
│   ├── app/
│   ├── components/
│   └── public/
├── mobile/               # React Native app
│   ├── src/
│   └── assets/
├── api/                  # Backend / REST API
│   ├── controllers/
│   ├── models/
│   └── routes/
├── iot/                  # Firmware e scripts IoT
│   └── sensors/
├── docs/                 # Documentação / Documentation
└── docker-compose.yml
```

---

## 🚀 Como Executar / Getting Started

### Pré-requisitos / Prerequisites

- Node.js `>= 18`
- PostgreSQL `>= 14`
- MongoDB `>= 6`
- Docker (opcional / optional)

---

### 🇧🇷 Executando localmente

```bash
# 1. Clone o repositório
git clone https://github.com/Klint-prog/SmartFarm.git
cd SmartFarm

# 2. Configure as variáveis de ambiente
cp .env.example .env
# Edite o arquivo .env com suas credenciais

# 3. Suba a API
cd api
npm install
npm run dev

# 4. Suba o frontend web
cd ../web
npm install
npm run dev

# 5. (Opcional) Rode tudo com Docker
docker-compose up --build
```

### 🇺🇸 Running locally

```bash
# 1. Clone the repository
git clone https://github.com/Klint-prog/SmartFarm.git
cd SmartFarm

# 2. Set up environment variables
cp .env.example .env
# Edit .env with your credentials

# 3. Start the API
cd api
npm install
npm run dev

# 4. Start the web frontend
cd ../web
npm install
npm run dev

# 5. (Optional) Run everything with Docker
docker-compose up --build
```

---

## 🌍 Variáveis de Ambiente / Environment Variables

```env
# Database
DATABASE_URL=postgresql://user:password@localhost:5432/smartfarm
MONGO_URI=mongodb://localhost:27017/smartfarm

# Auth
JWT_SECRET=your_jwt_secret

# IoT
MQTT_BROKER_URL=mqtt://localhost:1883

# App
NEXT_PUBLIC_API_URL=http://localhost:3001
```

---

## 🗺️ Roadmap

- [x] Dashboard web responsivo
- [x] Autenticação e controle de acesso
- [x] Integração com banco de dados
- [ ] App mobile (React Native)
- [ ] Integração MQTT com sensores reais
- [ ] Módulo de relatórios em PDF
- [ ] Notificações push
- [ ] Suporte multilíngue (i18n)
- [ ] PWA (Progressive Web App)

---

## 🤝 Contribuindo / Contributing

### 🇧🇷
Contribuições são muito bem-vindas! Este projeto está ativamente mantido.

1. Faça um **fork** do projeto
2. Crie uma branch: `git checkout -b feature/minha-feature`
3. Faça commit das suas mudanças: `git commit -m 'feat: adiciona minha feature'`
4. Envie para a branch: `git push origin feature/minha-feature`
5. Abra um **Pull Request**

Por favor, siga o padrão de commits [Conventional Commits](https://www.conventionalcommits.org/).

### 🇺🇸
Contributions are very welcome! This project is actively maintained.

1. **Fork** the project
2. Create your branch: `git checkout -b feature/my-feature`
3. Commit your changes: `git commit -m 'feat: add my feature'`
4. Push to the branch: `git push origin feature/my-feature`
5. Open a **Pull Request**

Please follow the [Conventional Commits](https://www.conventionalcommits.org/) standard.

---

## 📸 Screenshots

> 🚧 Em breve / Coming soon — adicione capturas de tela da interface na pasta `docs/screenshots/`

---

## 📄 Licença / License

Distribuído sob a licença **MIT**. Veja o arquivo [`LICENSE`](./LICENSE) para mais detalhes.  
Distributed under the **MIT** License. See [`LICENSE`](./LICENSE) for more information.

---

## 👤 Autor / Author

<p>
  Desenvolvido e mantido por / Developed and maintained by:
  <br/>
  <strong>Klint-prog</strong> — <a href="https://github.com/Klint-prog">github.com/Klint-prog</a>
</p>

---

<p align="center">
  Feito com 💚 para o agro brasileiro.<br/>
  Made with 💚 for Brazilian agriculture.
</p>
