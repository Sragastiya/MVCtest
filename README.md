# MVCtest

A small PHP web application built from scratch with the **Model-View-Controller (MVC)** pattern and no framework. It was made for the *Pemrograman Web Berbasis Framework* (Framework Based Web Programming) course at Politeknik Negeri Bali, as groundwork before moving on to Laravel.

## Features

- Front controller (`public/index.php`) with a hand-written router in `App.php`
- URL format `/controller/method/param1/param2`, falling back to `Home::index` when nothing matches
- Base `Controller` class with `view()` and `model()` helpers
- Shared `header.php` and `footer.php` templates, so the navbar is written once
- Bootstrap 5 styling (navbar, hero section, rounded image)
- `BASEURL` constant so asset links are defined in one place
- Database-backed page that lists fighter jets using PDO and prepared statements
- `.htaccess` rules for clean URLs and for blocking directory listing in `app/`

## Project Structure

```
MVCtest/
├── app/
│   ├── .htaccess              # Options -Indexes
│   ├── init.php               # loads the core files
│   ├── core/
│   │   ├── App.php            # router: parses the URL, runs controller/method
│   │   ├── Controller.php     # base class with view() and model()
│   │   └── Constants.php      # defines BASEURL
│   ├── controllers/
│   │   ├── Home.php
│   │   ├── About.php
│   │   └── Jetfighter.php
│   ├── models/
│   │   ├── User_model.php
│   │   └── Jet_model.php      # PDO connection and queries
│   └── views/
│       ├── templates/         # header.php, footer.php
│       ├── home/index.php
│       ├── about/             # index.php, page.php
│       └── jets/index.php
└── public/
    ├── .htaccess              # rewrites every request to index.php?url=...
    ├── index.php              # entry point
    ├── css/                   # Bootstrap CSS
    ├── js/                    # Bootstrap JS
    └── img/
```

## How It Works

1. `public/.htaccess` sends any request that is not a real file or folder to `index.php?url=<path>`.
2. `index.php` loads `app/init.php` and creates a new `App`.
3. `App::parseUrl()` trims the trailing slash, sanitizes the URL, and splits it on `/`.
4. `App` loads the matching controller (default `Home`), then the method (default `index`), and passes the remaining segments as parameters.
5. The controller fetches data from a model and hands it to a view, wrapped by the header and footer templates.

## Routes

| URL | Controller / Method | Description |
| --- | --- | --- |
| `/` | `Home::index` | Welcome page |
| `/about` | `About::index` | About page with a picture, using default parameter values |
| `/about/index/<name>/<bum>` | `About::index` | Same page with custom values from the URL |
| `/about/page` | `About::page` | Placeholder page |
| `/jetfighter` | `Jetfighter::index` | List of fighter jets from the database |

## Requirements

- PHP 8 or newer (the code uses return types such as `: void` and `: mixed`)
- Apache with `mod_rewrite` enabled
- MySQL or MariaDB
- XAMPP/LAMPP works well for local development

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Sragastiya/MVCtest.git
   ```
2. Put the project where Apache can serve it (inside `htdocs`, or exposed through an Apache alias).
3. Create a MySQL database named `phpmvc` with a table named `jet`. The view reads these columns: `name`, `manufacturer`, `country`, `role`. Add a few rows.
4. Check the connection settings in `app/models/Jet_model.php`. They default to host `localhost`, user `root`, empty password.
5. Edit `app/core/Constants.php` so `BASEURL` matches your local address. It is currently `http://localhost/pain/MVC/public`.
6. Start Apache and MySQL, then open the `BASEURL` address in a browser.

Example SQL:

```sql
CREATE DATABASE phpmvc;
USE phpmvc;

CREATE TABLE jet (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  manufacturer VARCHAR(100),
  country VARCHAR(100),
  role VARCHAR(100)
);

INSERT INTO jet (name, manufacturer, country, role) VALUES
  ('F-16 Fighting Falcon', 'General Dynamics', 'United States', 'Multirole fighter'),
  ('Su-27 Flanker', 'Sukhoi', 'Soviet Union', 'Air superiority fighter');
```

## Notes

- Database credentials are hardcoded for local learning purposes. Move them into a config file (and keep real passwords out of version control) before deploying anything.
- `BASEURL` is also hardcoded, so it must be changed per machine.

## Author

Emmanuel ([@Sragastiya](https://github.com/Sragastiya)), Software Engineering student at Politeknik Negeri Bali.

## Acknowledgements

Structure and approach follow the lecturer's MVC course manuals, reimplemented in my own words.
