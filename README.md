# 🗓️ Content Scheduler

A simplified content scheduling web application built with Laravel + Tailwind + Vue, allowing users to create, schedule, and manage posts across multiple social media platforms.

## 🚀 Demo Preview

### Postman Collection Setup
[ https://drive.google.com/drive/u/1/home
](https://drive.google.com/file/d/1ec336GL1BA22h90DADXPc6B6p_HzLyKX/view?usp=sharing)
---

## 🧩 Features

- ✅ Register/Login via Laravel Sanctum / Laravel breeze
- ✅ Create & Schedule Posts (Draft / Scheduled / Published)
- ✅ Platform selection per post (Twitter, Instagram, etc.)
- ✅ Calendar view with scheduled post indicators
- ✅ Post Analytics (counts, success rate, per-platform data)
- ✅ Platform toggling in settings
- ✅ Character limit validations
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
{{token}}  => <your generated Sanctum token> => will be added automatically 
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
 
