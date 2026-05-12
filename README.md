# SnapLink - Modern URL Shortener

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/SQLite-003B57?style=for-the-badge&logo=sqlite&logoColor=white" alt="SQLite">
  <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
  <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
</p>

## 📝 Description

**SnapLink** is a lightweight, high-performance, and premium URL shortener built with Laravel. It offers a seamless experience for transforming long, cluttered URLs into clean, manageable links. Designed with a focus on aesthetics and speed, SnapLink provides instant results, detailed analytics, and QR code generation without the bloat of heavy CSS frameworks.

## ✨ Features

- **Dual Mode Shortening**: Choose between a random 6-character slug or create your own custom vanity URL.
- **QR Code Generation**: Instantly generate high-quality QR codes for every shortened link, available for download as PNG.
- **Real-time Analytics**: Monitor your links' performance with a dedicated dashboard showing total clicks (hits) and creation dates.
- **Multilingual Support**: Fully localized interface in **English** and **Indonesian**.
- **Premium UI/UX**: Dark-themed, modern interface built with Vanilla CSS, featuring smooth animations and glassmorphism effects.
- **Instant Redirection**: High-speed link redirection with hit tracking.
- **Responsive Design**: Fully optimized for mobile, tablet, and desktop viewing.

## 🚀 Tech Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Database**: MySQL
- **Frontend**: Blade Templating Engine
- **Styling**: Vanilla CSS (No frameworks for maximum performance)
- **Library**: [qrcode.js](https://davidshimjs.github.io/qrcodejs/) for client-side QR generation.

## 📋 Requirements

- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM (Optional, for asset compilation if using Vite)

## 🛠️ Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/yourusername/snaplink.git
   cd snaplink
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database Configuration**:
   By default, this project uses MySQL. Create the database file:
   ```bash
   touch database/database.MySQL
   ```
   *Make sure DB_CONNECTION=MySQL in your .env file.*

5. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

6. **Start the application**:
   ```bash
   php artisan serve
   ```

## 📖 Usage

1. **Shorten a URL**: Enter your long link in the input box, select "Auto Generate" or "Custom Slug", and hit "Shorten".
2. **Copy & Share**: Use the "Copy" button to save the link to your clipboard or generate a QR code for physical sharing.
3. **Track Performance**: Navigate to the **Analytics** page to see how many people have clicked your links.
4. **Switch Language**: Use the EN/ID toggle in the navigation bar to change the interface language.

---

Built with ❤️ using [Laravel](https://laravel.com).
