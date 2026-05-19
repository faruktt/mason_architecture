# BIG Architecture — Laravel 11 Full Stack Project

A full-stack Laravel 11 website inspired by **Mason** , featuring a premium Bootstrap 5 frontend and a complete admin panel.

---

## 🚀 Features

### Frontend
- **Homepage** — Hero, featured projects, stats, news, careers CTA
- **Projects** — Grid listing with category filters + detail pages
- **About** — Studio overview with BIG LEAP breakdown
- **People** — Partners & team members with photos
- **Sustainability** — Environmental commitment + landmark projects
- **Careers** — Job listings with department/location filters + detail pages
- **News** — Articles listing + detail pages
- Fully **mobile responsive** (Bootstrap 5)
- Dark premium navbar with mobile hamburger menu

### Admin Panel
- **Dashboard** — Stats overview, recent projects & news, quick actions
- **Projects** — Full CRUD (create, edit, delete, image upload, featured toggle)
- **Team** — Full CRUD with photo upload, partner flag, office selection
- **Careers** — Full CRUD (department, location, type, deadline, apply URL)
- **News** — Full CRUD with cover image, category, draft/publish
- **Settings** — Site name, contact info, addresses
- **Authentication** — Secure login with remember me, password toggle

---

## 🛠 Requirements

- PHP **8.2+**
- Composer
- MySQL / MariaDB (or SQLite for local dev)
- Node.js & NPM (optional, for asset compilation)

---

## ⚙️ Installation

### 1. Clone / Extract the project

```bash
cd big-architecture
```

### 2. Install PHP dependencies

```bash
composer install
```

### 3. Environment Setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure Database

Edit `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=big_architecture
DB_USERNAME=root
DB_PASSWORD=yourpassword
```

> **SQLite alternative** (no MySQL needed):
> ```env
> DB_CONNECTION=sqlite
> DB_DATABASE=/absolute/path/to/database/database.sqlite
> ```
> Then run: `touch database/database.sqlite`

### 5. Run Migrations & Seed Demo Data

```bash
php artisan migrate --seed
```

This creates all tables and populates with sample:
- 8 architecture projects
- 6 team members / partners
- 5 job postings
- 3 news articles
- Site settings

### 6. Create Storage Link (for image uploads)

```bash
php artisan storage:link
```

### 7. Start Development Server

```bash
php artisan serve
```

Visit: **http://localhost:8000**

---

## 🔐 Admin Login

| Field | Value |
|-------|-------|
| URL | http://localhost:8000/admin/login |
| Email | admin@big.dk |
| Password | password |

---

## 📁 Project Structure

```
big-architecture/
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Dashboard, Projects, Team, Careers, News, Settings
│   │   ├── Frontend/       # Home, Projects, Team, Careers, News
│   │   └── Auth/           # Login/Logout
│   ├── Models/             # Project, TeamMember, Career, News, Setting, User
│   └── Providers/
├── database/
│   ├── migrations/         # All table schemas
│   └── seeders/            # Demo data
├── resources/views/
│   ├── admin/
│   │   ├── layouts/app.blade.php   # Admin sidebar layout
│   │   ├── dashboard.blade.php
│   │   ├── projects/               # index, create, edit, show
│   │   ├── team/                   # index, create, edit, show
│   │   ├── careers/                # index, create, edit, show
│   │   ├── news/                   # index, create, edit, show
│   │   └── settings/               # index
│   ├── frontend/
│   │   ├── layouts/app.blade.php   # Frontend navbar/footer layout
│   │   ├── home.blade.php
│   │   ├── about.blade.php
│   │   ├── people.blade.php
│   │   ├── sustainability.blade.php
│   │   ├── projects/               # index, show
│   │   ├── careers/                # index, show
│   │   └── news/                   # index, show
│   └── auth/login.blade.php
├── routes/web.php
└── public/
```

---

## 🎨 Design

- **Frontend**: Dark hero, yellow accent (#e8ff00), Inter font, card-based project grid
- **Admin**: Dark sidebar (#0a0a0a), yellow accent, clean white content area, responsive mobile sidebar

---

## 📸 Image Uploads

Uploaded images are stored in `storage/app/public/` and served via the `storage` symlink. Make sure you've run `php artisan storage:link`.

---

## 🔧 Customization

- Add more settings in `database/seeders/DatabaseSeeder.php` and `resources/views/admin/settings/index.blade.php`
- Change the accent color by updating `--accent: #e8ff00` in both layout files
- Add new admin users via `php artisan tinker` and `User::create([...])`

---

## 📝 License

MIT — Free to use and modify.
# mason_architecture
