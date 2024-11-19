# Job Hunting System 💼

Welcome to the **Job Hunting System**! This project was created as part of a technical test during my job hunt. The system is designed to streamline job hunting processes by providing features like job postings, applications, and user management.

---

## Features ✨

- **User Authentication**: Secure login and registration system using Laravel Breeze.
- **Job Postings**: Employers can create, edit, and delete job postings.
- **Job Applications**: Candidates can browse jobs and submit applications.
- **Admin Dashboard**: Manage users, jobs, and applications.
- **Search and Filter**: Filter jobs by categories, location, or keywords.
- **Responsive Design**: Accessible on both desktop and mobile devices.

---

## Tech Stack 🛠️

This project is built using:

- **Laravel 11**: Backend framework for PHP.
- **MySQL**: Database for storing job, user, and application data.
- **Blade Templates**: Frontend templating engine.
- **Bootstrap**: For responsive and sleek UI.
- **Composer**: Dependency management.
- **Artisan**: Built-in Laravel CLI for tasks.

---

## Installation and Setup 🚀

Follow these steps to run the project locally:

### Prerequisites
- PHP 8.2 or higher
- Composer 2.0+
- MySQL 8.0+
- Node.js & npm
- Laravel CLI

### Steps
1. **Clone the Repository**  
   ```bash
   git clone https://github.com/your-username/job-hunting-system.git
   cd job-hunting-system

2. **Install Dependencies**  
   ```bash
   composer install
   npm install && npm run dev

2. **Set Up Environment**  
   ```bash
   cp .env.example .env

2. **Update the .env file with your database credentials**  
   ```bash
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=job_hunting
    DB_USERNAME=root
    DB_PASSWORD=your_password

2. **Generate App Key**  
   ```bash
    php artisan key:generate

2. **Run Migrations**  
   ```bash
   php artisan migrate --seed

2. **Run the Application**  
   ```bash
   php artisan serve
   Access the application at http://http://127.0.0.1:8000.