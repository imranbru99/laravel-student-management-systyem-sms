# 🎓 EduManage - Premium Student Management System

EduManage is a modern, lightning-fast, and highly secure Student Management System. Built with the latest **Laravel** framework and **Tailwind CSS v4**, it features a breathtaking glassmorphic UI, complete Spatie role-based access control (RBAC), and a flawless dark/light mode experience.

## ✨ Features
* **Modern Premium UI:** A stunning, Vercel-inspired glassmorphism aesthetic built entirely with Tailwind CSS v4.
* **Dark/Light Mode:** Seamless, user-controlled theme switching that persists across sessions.
* **Student Management (CRUD):** Add, view, edit, and delete students with image uploading capabilities.
* **Role-Based Access Control:** Powered by Spatie. Easily assign Super Admin, Admin, and Teacher roles to protect sensitive routes and actions.
* **Secure Authentication:** Built on Laravel Breeze with custom-designed premium login, registration, and password recovery screens.
* **Dynamic Dashboard:** Real-time metrics and beautiful summary cards based on real database records.

## 📸 Screenshots

### 🌐 Public & Authentication
* [**Modern Home Page / Landing**](https://prnt.sc/L6oD71o-tYNE)
* [**Premium Login UI**](https://prnt.sc/Towxim4c3WHn)

### 📊 Admin Dashboard
* [**Dashboard (Light Mode View)**](https://prnt.sc/PqGp_YYOoL99)
* [**Dashboard (Dark Mode View)**](https://prnt.sc/5l-azRSKfbCo)

### 👨‍🎓 Student Management
* [**Student List & Management**](https://prnt.sc/9AsmSxMJqCdF)
* [**Create/Add Student Form**](https://prnt.sc/ksRTFi4ninjn)

### 🔐 User & Role Management
* [**System User & Roles List**](https://prnt.sc/Towxim4c3WHn)
* [**Edit User Permissions/Roles**](https://prnt.sc/lKoe6bSYKlzG)

## 🛠️ Tech Stack
* **Backend:** Laravel 11/13 (PHP 8.2+)
* **Frontend:** Blade Templating, Tailwind CSS v4
* **Database:** MySQL
* **Authorization:** Spatie Laravel Permission

## 🚀 Installation & Setup

1. **Clone the repository**
   ```bash
   git clone [https://github.com/imranbru99/laravel-student-management-systyem-sms.git](https://github.com/imranbru99/laravel-student-management-systyem-sms.git)
   cd laravel-student-management-systyem-sms

   

2.  **Install Composer Dependencies**

    ```bash
    composer install
    ```

3.  **Set up Environment Variables**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    *Note: Update your `.env` file with your database credentials (DB\_DATABASE, DB\_USERNAME, DB\_PASSWORD).*

4.  **Run Migrations & Seeders**
    *(This will set up the database and insert the default Spatie roles: Super Admin, Admin, Teacher)*

    ```bash
    php artisan migrate:fresh --seed
    ```

5.  **Link Storage (Important for Student Photos)**

    ```bash
    php artisan storage:link
    ```

6.  **Serve the Application**

    ```bash
    php artisan serve
    ```

## 🧑‍💻 Author & Support

🚀 **NEED A FIX OR CUSTOM FEATURE? CONTACT ME:**

  * 🌐 **Portfolio:** [imrandev.space](https://imrandev.space)
  * 📧 **Email:** [me@imrandev.space](mailto:me@imrandev.space)
  * 📞 **WhatsApp:** [+8801576918420](https://www.google.com/search?q=https://wa.me/8801576918420)

-----

Built with ❤️ by **Imran Ahmed**
