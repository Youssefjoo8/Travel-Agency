# 🌍 Travel Agency

A modern, responsive travel agency website featuring a dynamic booking system, dark mode, and multi-language support (English & Arabic).

## 🚀 Features

-   **Responsive Design**: Fully optimized for Desktop, Tablet, and Mobile.
-   **Dark Mode**: Seamless toggle between Light and Dark themes.
-   **Multi-Language**: Full Arabic support (RTL) and English.
-   **Booking System**: Integrated PHP booking form with MySQL database.
-   **Dynamic Gallery**: Interactive hover effects and smooth transitions.
-   **International Phone Input**: Smart country code selection for booking.

## 🛠️ Tech Stack

-   **Frontend**: HTML5, CSS3, JavaScript (Vanilla).
-   **Backend**: PHP (v7.4+).
-   **Database**: MySQL.
-   **Libraries**:
    -   FontAwesome (Icons)
    -   SwiperJS (Sliders)
    -   intl-tel-input (Phone Formatting)

## ⚙️ Setup Instructions (Localhost)

Follow these steps to run the project locally using XAMPP or any PHP server.

### 1. Install XAMPP
Download and install [XAMPP](https://www.apachefriends.org/index.html).

### 2. Clone the Repository
Clone this repo to your `htdocs` folder.
```bash
cd c:\xampp\htdocs
git clone https://github.com/Start-Tech-Academy/travel-agency-team21.git
```

### 3. Import the Database
1.  Open **XAMPP Control Panel** and start **Apache** and **MySQL**.
2.  Go to `http://localhost/phpmyadmin`.
3.  Create a new database named **`book_db`**.
4.  Click **Import** tab.
5.  Choose the `database.sql` file provided in this project's root directory.
6.  Click **Go**.

### 4. Run the Website
Open your browser and navigate to:
```
http://localhost/new_one_travel2/pages/en/home.php
```

## 📂 Project Structure

-   `css/` - Global stylesheets (Deep Navy & Amber Theme).
-   `js/` - Main JavaScript file (`script.js`).
-   `pages/en/` - English pages (Home, About, Book, etc.).
-   `pages/ar/` - Arabic pages (RTL support).
-   `images/` - Project assets.
-   `database.sql` - Database import file.

## 🔗 Live Demo
You can visit the live website here:
👉 http://team21-travel.rf.gd
