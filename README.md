# 🌍 Travel Agency - Team 21

A premium, responsive travel agency website featuring a dynamic booking system, secure payment flows, and full multi-language support.

## 📂 Project Structure

-   `config.php` - Database connection settings (Excluded from Git).
-   `database.sql` - Complete database schema and initial data.
-   `pages/en/` - English version of the website.
    -   `home.php` - Landing page.
    -   `book.php` - Booking form with integrated payment.
    -   `package.php` - Tour packages display.
-   `pages/ar/` - Arabic version (RTL) of the website.
    -   `home arabic.php` - Arabic landing page.
    -   `book arabic.php` - Arabic booking form.
-   `css/` - Global styles and design system tokens.
-   `js/` - Frontend logic and AJAX handlers.
-   `images/` - Optimized project assets and media.
-   `vendor/` - Third-party libraries (Dompdf, etc.).

## 🚀 Setup & Installation

1.  **Clone the Repo**: `git clone https://github.com/Youssefjoo8/Travel-Agency.git`
2.  **Database Setup**:
    -   Create a terminal/phpMyAdmin database named `book_db`.
    -   Import `database.sql`.
3.  **Configuration**:
    -   Rename `config.sample.php` to `config.php` and update your MySQL credentials.
4.  **Launch**:
    -   Start Apache/MySQL in XAMPP.
    -   Navigate to `http://localhost/Travel-Agency/pages/en/home.php`.

## 🛠️ Key Features
-   **In-Page PDF Receipts**: Dynamic generation using Dompdf.
-   **Secure Payment Flow**: Validated frontend with hidden download logic.
-   **RTL Support**: Seamless Arabic translation and layout.
