# CI4 CMS Starter

A modern, feature-rich Content Management System built with **CodeIgniter 4**. This starter kit provides a solid foundation for building content-driven websites with user management, role-based access control, and a flexible blog system.

![CodeIgniter](https://img.shields.io/badge/CodeIgniter-4.6.3-orange)
![PHP](https://img.shields.io/badge/PHP-8.1%2B-blue)
![License](https://img.shields.io/badge/license-MIT-green)

## ✨ Features

- 🔐 **Authentication System** - Secure login/logout with session management
- 👥 **User Management** - Complete CRUD operations for users with role-based access
- 📝 **Blog Management** - Create, edit, and publish blog posts with rich text editor
- 🎨 **Modern UI** - Clean, responsive design with Tailwind CSS
- 🖼️ **Image Upload** - Hero image support for blog posts
- 📊 **Admin Dashboard** - Comprehensive admin panel with statistics
- 🔍 **SEO Friendly** - Clean URLs and proper meta tags
- 🎯 **Role-Based Access** - Admin and User roles with permissions
- ✏️ **Rich Text Editor** - CKEditor 5 integration for content creation
- 📱 **Responsive Design** - Mobile-friendly interface

## 🛠️ Tech Stack

- **Framework**: CodeIgniter 4.6.3
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL/MariaDB
- **Editor**: CKEditor 5
- **Charts**: Chart.js

## 📋 Requirements

- PHP 8.1 or higher
- MySQL 5.7+ or MariaDB 10.3+
- Composer
- Apache/Nginx web server
- PHP Extensions:
  - intl
  - mbstring
  - json
  - mysqlnd
  - libcurl

## 🚀 Installation

### 1. Clone the Repository

```bash
git clone <repository-url>
cd ci4-cms-starter
```

### 2. Install Dependencies

```bash
composer install
```

### 3. Environment Configuration

Copy the `env` file to `.env`:

```bash
cp env .env
```

Edit `.env` and configure your database settings:

```ini
# Database Configuration
database.default.hostname = 127.0.0.1
database.default.database = ci4_cms
database.default.username = root
database.default.password = 
database.default.DBDriver = MySQLi
database.default.DBPrefix = 
database.default.port = 3306

# Base URL
app.baseURL = 'http://localhost:3000/'

# Environment
CI_ENVIRONMENT = development
```

### 4. Create Database

Create a new MySQL database:

```sql
CREATE DATABASE ci4_cms;
```

Or use the provided helper script:

```bash
php create_db.php
```

### 5. Run Migrations

Run the database migrations to create all required tables:

```bash
php spark migrate
```

This will create the following tables:

- `users` - User accounts
- `roles` - User roles (Admin, User)
- `blogs` - Blog posts with author_name field

### 6. Seed Initial Data

Seed the database with an admin user and default roles:

```bash
php spark db:seed AdminSeeder
```

**Default Admin Credentials:**

- Email: `admin@example.com`
- Password: `password`

### 7. Create Upload Directories

Create the necessary directories for file uploads:

```bash
mkdir -p public/uploads/hero
mkdir -p public/uploads/content
```

On Windows:

```cmd
mkdir public\uploads\hero
mkdir public\uploads\content
```

### 8. Start Development Server

```bash
php spark serve --port 3000
```

The application will be available at `http://localhost:3000`

## 📁 Project Structure

```
ci4-cms-starter/
├── app/
│   ├── Controllers/
│   │   ├── Admin/          # Admin panel controllers
│   │   │   ├── Blogs.php
│   │   │   ├── Dashboard.php
│   │   │   ├── Upload.php
│   │   │   └── Users.php
│   │   ├── Auth.php        # Authentication controller
│   │   └── Home.php        # Public pages controller
│   ├── Database/
│   │   ├── Migrations/     # Database migrations
│   │   └── Seeds/          # Database seeders
│   ├── Filters/
│   │   └── AuthFilter.php  # Authentication filter
│   ├── Models/
│   │   ├── BlogModel.php
│   │   └── UserModel.php
│   └── Views/
│       ├── admin/          # Admin panel views
│       ├── auth/           # Login page
│       ├── blog/           # Blog pages
│       └── layouts/        # Layout templates
├── public/
│   ├── uploads/            # User uploaded files
│   └── index.php
└── writable/               # Cache, logs, sessions
```

## 🎯 Usage

### Accessing the Application

- **Homepage**: `http://localhost:3000/`
- **Blog Listing**: `http://localhost:3000/blog`
- **Admin Login**: `http://localhost:3000/login`
- **Admin Dashboard**: `http://localhost:3000/admin/dashboard`

### Admin Panel Features

1. **Dashboard** - View statistics and recent activity
2. **User Management** - Create, edit, and delete users
3. **Blog Management** - Create, edit, publish, and delete blog posts
4. **Blog Preview** - Preview unpublished posts before publishing

### Creating a Blog Post

1. Login to admin panel
2. Navigate to "Blogs" → "Create Blog"
3. Fill in the details:
   - Title (required)
   - Slug (required, URL-friendly)
   - Author Name (optional text field)
   - Hero Image (optional)
   - Content (rich text editor)
   - Status (draft/review/published)
4. Click "Create Blog Post"

### Author Field

The author field is an **optional text input** that allows you to:

- Enter any author name manually
- Leave it blank for anonymous posts
- Display "Unknown Author" if not provided

This provides flexibility compared to being restricted to registered users only.

## 🔧 Configuration

### Changing Database Port

If your MySQL runs on a different port (e.g., 3307), update `.env`:

```ini
database.default.port = 3307
```

### Changing Base URL

Update the base URL in `.env`:

```ini
app.baseURL = 'http://yourdomain.com/'
```

### File Upload Settings

Maximum upload size is set to 2MB by default. To change this, edit:

- `app/Controllers/Admin/Blogs.php` - Update validation rules
- `php.ini` - Update `upload_max_filesize` and `post_max_size`

## 🔐 Security

- Passwords are hashed using PHP's `password_hash()` with bcrypt
- CSRF protection is available (can be enabled in `app/Config/Filters.php`)
- Authentication filter protects admin routes
- Input validation on all forms
- XSS protection via CodeIgniter's `esc()` function

## 📝 Database Schema

### Users Table

- `id` - Primary key
- `username` - Unique username
- `email` - Unique email
- `password_hash` - Hashed password
- `role_id` - Foreign key to roles table
- `created_at`, `updated_at` - Timestamps

### Blogs Table

- `id` - Primary key
- `title` - Blog title
- `slug` - URL-friendly slug
- `content` - Blog content (HTML)
- `author_name` - Optional author name (text field)
- `hero_image` - Hero image filename
- `status` - draft/review/published
- `created_at`, `updated_at` - Timestamps

### Roles Table

- `id` - Primary key
- `name` - Role name (admin/user)
- `permissions` - JSON permissions

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

This project is open-sourced software licensed under the MIT license.

## 🙏 Acknowledgments

- Built with [CodeIgniter 4](https://codeigniter.com/)
- UI powered by [Tailwind CSS](https://tailwindcss.com/)
- Rich text editing with [CKEditor 5](https://ckeditor.com/)
- Icons from [Heroicons](https://heroicons.com/)

## 📞 Support

For issues, questions, or contributions, please open an issue on GitHub.

---

**Happy Coding! 🚀**
