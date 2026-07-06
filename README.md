# ViaResolve — Landing Page

Landing page institucional com painel de leads para assessoria de trânsito.

---

## Stack

| Camada | Tecnologia |
|--------|-----------|
| Backend | Laravel 12 + PHP 8.4 |
| Templates | Blade |
| Banco | SQLite (arquivo local) |
| CSS | SCSS modular (sem Tailwind) |
| Build | Vite 5 |
| Mail | Log driver (fake/desenvolvimento) |

---

## Screenshots

### Hero — acima da dobra

![Hero section](C:/Users/terc.caio.abra_g4edu/Documents/Projects/viaresolve-landing/docs/screenshots/01-hero.jpg)

### Landing completa

![Landing page](C:/Users/terc.caio.abra_g4edu/Documents/Projects/viaresolve-landing/docs/screenshots/02-landing-full.jpg)

### Formulário de contato e footer

![Contact e Footer](C:/Users/terc.caio.abra_g4edu/Documents/Projects/viaresolve-landing/docs/screenshots/03-contact-footer.jpg)

---

## Estrutura do projeto

```
viaresolve-landing/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── LandingController.php        # index + submit do formulário
│   │   │   └── Admin/
│   │   │       └── LeadsController.php      # CRUD do painel admin
│   │   ├── Middleware/
│   │   │   └── AdminAuth.php                # Guard de sessão simples
│   │   └── Requests/
│   │       └── LeadFormRequest.php          # Validação do formulário
│   ├── Mail/
│   │   └── LeadReceived.php                 # Notificação por e-mail
│   └── Models/
│       └── Lead.php                         # Model com status labels
│
├── database/
│   ├── database.sqlite                      # Banco SQLite local
│   └── migrations/
│       └── 2026_07_06_..._create_leads_table.php
│
├── resources/
│   ├── js/
│   │   └── app.js                           # AOS, countup, navbar, máscara tel.
│   ├── scss/
│   │   ├── app.scss                         # Entry point da landing
│   │   ├── admin.scss                       # Entry point do painel admin
│   │   ├── base/
│   │   │   ├── _variables.scss
│   │   │   ├── _reset.scss
│   │   │   └── _animations.scss
│   │   └── components/
│   │       ├── _navbar.scss
│   │       ├── _hero.scss
│   │       ├── _stats.scss
│   │       ├── _solutions.scss
│   │       ├── _about.scss
│   │       ├── _ticker.scss
│   │       ├── _problem.scss
│   │       ├── _testimonials.scss
│   │       ├── _contact.scss
│   │       ├── _footer.scss
│   │       └── _buttons.scss
│   └── views/
│       ├── layouts/app.blade.php
│       ├── landing/index.blade.php
│       ├── admin/
│       │   ├── login.blade.php
│       │   └── leads/index.blade.php
│       └── emails/lead-received.blade.php
│
├── routes/web.php
├── vite.config.js
└── .env
```

---

## Como rodar

### 1. Pré-requisitos

- PHP 8.2+
- Composer
- Node.js 20+
- npm

### 2. Instalar dependências

```bash
composer install
npm install
```

### 3. Configurar ambiente

```bash
cp .env.example .env        # ou edite o .env existente
php artisan key:generate
```

O `.env` já está configurado com SQLite e Mail log — não é necessário nenhuma configuração extra para rodar em desenvolvimento.

### 4. Criar o banco

```bash
touch database/database.sqlite
php artisan migrate
```

### 5. Compilar assets

```bash
# Desenvolvimento (com hot reload)
npm run dev

# Produção
npm run build
```

### 6. Subir o servidor

```bash
php artisan serve
```

Acesse: **http://localhost:8000**

---

## Rotas

| Método | URL | Descrição |
|--------|-----|-----------|
| `GET` | `/` | Landing page |
| `POST` | `/contato` | Submissão do formulário |
| `GET` | `/admin/login` | Login do painel |
| `POST` | `/admin/login` | Autenticação |
| `GET` | `/admin/leads` | Painel de leads |
| `PATCH` | `/admin/leads/{id}/status` | Atualizar status do lead |
| `DELETE` | `/admin/leads/{id}` | Remover lead |

---

## Painel Admin

Acesse `/admin` — será redirecionado para `/admin/login`.

**Senha padrão:** definida em `.env` → `ADMIN_PASSWORD=viaresolve@2026`

Funcionalidades do painel:
- Cards de métricas (total, novos, contatados, encerrados)
- Tabela de leads com busca e filtro por status
- Atualização de status inline (sem recarregar página)
- Exclusão de leads
- Paginação

---

## E-mails

O projeto usa `MAIL_MAILER=log` por padrão. Todos os e-mails são gravados em:

```
storage/logs/laravel.log
```

Para usar SMTP em produção, atualize as variáveis `MAIL_*` no `.env`.

---

## Seções da landing

| Seção | ID | Descrição |
|-------|----|-----------|
| Navbar | — | Fixa, glassmorphism ao rolar |
| Hero | `#inicio` | Fullscreen com imagem de fundo e parallax |
| Métricas | `#resultados` | 4 cards com countup animado |
| Soluções | `#solucoes` | 4 cards de serviço |
| Quem somos | `#quem-somos` | 2 colunas com números |
| Ticker | — | Marquee animado |
| CNH cassada | `#cnh-cassada` | Seção de problema/benefícios |
| Depoimentos | `#depoimentos` | 3 cards de clientes |
| Contato | `#contato` | Formulário de captura de lead |
| Footer | — | Informações de contato |

---

## Animações

- **AOS** — implementado via `IntersectionObserver` nativo (sem dependência externa)
- **Countup** — números sobem de 0 ao valor final com easing `easeOutExpo`
- **Ticker marquee** — CSS animation loop infinito
- **Navbar** — transição glassmorphism ao ultrapassar 40px de scroll
- **Hero scroll arrow** — animação `floatY` em loop

---

## Feito por

**Caio M Abra**
Entre em contato: **+55 11 99847-9359**
