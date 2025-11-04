# 🚀 Laravel Blog Platform with Content Importer

Built for the **Fullstack Developer Test**  
Laravel 11 | Blade | Auth | Admin CRUD | External API Integration | Middleware

---

## ✅ What I Built

A complete blog platform built entirely in **Laravel**, featuring:

- 🧠 Backend: models, migrations, controllers, services, middleware
- 🎨 Frontend: Blade views with Bootstrap 5
- 🔐 Auth system: login, register, logout
- 🧑‍💼 Admin-only panel: create/edit/delete posts, import content
- 🌐 External API integration: JSONPlaceholder + FakeStore
- 🧩 Data transformation + duplicate prevention
- 📄 Public blog feed (only published posts)
- 📦 Pagination, seeding, clean UI

---

## 🧱 Tech Stack

- Laravel 12
- Blade templating
- Bootstrap 5
- MySQL
- REST APIs (JSONPlaceholder, FakeStore)

---

## **Setup**

```bash
git clone https://github.com/jenisdamraliya/blog-content-importer.git
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed
php artisan serve
```

---

## 🔐 Admin Login Credentials

To access the admin panel and import posts:

- Email: admin@example.com 
- Password: admin123

---

## 🧠 My Approach

1. Setup Laravel project and resolved route errors
2. Created `create_posts_table` migration, `Post` model, and `PostController`
3. Added login/register views and routes
4. Built basic blog listing page
5. Created services/PostImporter.php to fetch and transform data from:
   - JSONPlaceholder API
   - FakeStore API
6. Created `ImportController` to store imported content
7. Added `is_admin` column to users table via migration
8. Built `AuthController` for login, register, logout
9. Seeded admin user
10. Created `AdminPostController` for admin CRUD
11. Built `admin` middleware and registered it in `bootstrap/app.php`
12. Scoped public view to published posts only
13. Added Read More page with clean layout
14. Registered pagination styling via `AppServiceProvider::useBootstrapFive()`
15. Added import buttons to admin navbar (admin-only)

---

## **Total Time Spent**

This task should take me 3 hours to complete.

---

### **APIs**

- **JSONPlaceholder**: `https://jsonplaceholder.typicode.com/posts/{randomId}`
- **FakeStore API**: `https://fakestoreapi.com/products/{randomId}`

---

## **The Challenge**

Transform two different data structures into consistent blog posts.

---