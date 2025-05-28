# 🗓️ Content Scheduler

A simplified content scheduling web application built with Laravel + Tailwind + Vue, allowing users to create, schedule, and manage posts across multiple social media platforms.

## 🚀 Demo Preview

### Dashboard with Analytics and Calendar
![Dashboard](./public/screenshots/dashboard.jpeg)

### Posts Management with Filters
![Posts](./public/screenshots/posts.jpeg)

### Platform Settings Page
![Settings](./public/screenshots/settings.jpeg)

### Postman Collection Setup
![Postman](./public/screenshots/postman.png)

---

## 🧩 Features

- ✅ Register/Login via Laravel Sanctum
- ✅ Create & Schedule Posts (Draft / Scheduled / Published)
- ✅ Platform selection per post (Twitter, Instagram, etc.)
- ✅ Calendar view with scheduled post indicators
- ✅ Post Analytics (counts, success rate, per-platform data)
- ✅ Platform toggling in settings
- ✅ Character limit validations
- ✅ Activity logging
- ✅ Daily scheduling limit (max 10 per user)

---

## 📦 Tech Stack

- **Laravel 12**
- **Vue 3 + TailwindCSS**
- **MySQL**
- **Sanctum Auth**
- **Postman API Collection**

---

## 🛠️ Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/content-scheduler.git
cd content-scheduler
```

### 2. Install dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

> Make sure to configure your database credentials inside `.env`

### 4. Run Migrations & Seeders

```bash
php artisan migrate --seed
```

### 5. Start Local Server

```bash
php artisan serve
```

---

## 📬 Postman Collection

1. Import the collection from the file: `postman/ContentScheduler.postman_collection.json`
2. Set the variables:

```
{{url}}    => http://127.0.0.1:8000/api
{{token}}  => <your generated Sanctum token>
```

3. Use the folders:
   - `Auth`: Register/Login
   - `Posts`: Create, List, Update, Delete
   - `Platforms`: List/Toggle platforms

---

## 📊 Publishing Job

A Laravel scheduled command is included to auto-publish posts:

```bash
php artisan schedule:work
```

Make sure to add it to your cron:

```bash
* * * * * php /path/to/artisan schedule:run >> /dev/null 2>&1
```
 
