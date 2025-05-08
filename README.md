# 📘 Interview Task – Laravel Authors & Books CRUD

This Laravel application contains two modules: **Authors** and **Books**. Each author can have multiple books. The app supports full CRUD operations, author-book relationship views, and a chatbot that responds to database queries in real-time.

---

## 🛠️ Features

- Full Create, Read, Update, Delete (CRUD) for Authors and Books
- Show number of books per author on listing page
- Author detail page with associated books
- Form validation during create and update
- Simple chatbot integration to handle:
  - "How many authors are there?"
  - "How many books are available?"
  - "List top 5 authors."

---

## 🚀 Setup Instructions

Follow these steps to run the project locally:

```bash
git clone <your-repo-link>
cd author-book-app
composer install
cp .env.example .env
php artisan key:generate
# Open .env and configure your DB credentials
php artisan migrate
npm install
npm run dev
php artisan serve
