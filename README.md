# MVCtest

A small PHP web application built from scratch with the **Model-View-Controller (MVC)** pattern and no framework. It was made for the *Pemrograman Web Berbasis Framework* (Framework Based Web Programming) course at Politeknik Negeri Bali, as groundwork before moving on to Laravel.

## Features

- Front controller (`public/index.php`) with a hand-written router in `App.php`
- URL format `/controller/method/param1/param2`, falling back to `Home::index` when nothing matches
- Base `Controller` class with `view()` and `model()` helpers
- Shared `header.php` and `footer.php` templates, so the navbar is written once
- Tailwind CSS 3 styling with the existing `tw-` class prefix
- Alpine.js profile links and responsive mobile navigation
- `BASEURL` derived from the current PHP script path, with an optional environment override
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
    ├── css/                   # compiled Tailwind CSS; older Bootstrap files retained
    ├── js/                    # local Alpine.js and older Bootstrap files
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
3. Use a MySQL database named `phpmvc` with a table named `jet`. The view reads these columns: `name`, `manufacturer`, `country`, `role`. If your database already exists, do not recreate or re-import it. The SQL below is only an example for a fresh database. Check that any saved SQL export is non-empty before treating it as a backup.
4. Check the connection settings in `app/models/Jet_model.php`. They default to host `localhost`, user `root`, empty password.
5. Start Apache and MySQL. With this folder under Windows XAMPP's `htdocs`, open `http://localhost/MVC/public/`. `BASEURL` uses the directory of the current PHP script, so a Linux Apache alias can use a different URL without editing the PHP file. An alias mapping `/pain` directly to the project directory normally uses `/pain/public/`. The actual alias configuration determines the address.
6. To override the base URL, set the `MVC_BASEURL` environment variable in the local server configuration. Keep this configuration local to each OS.

## Tailwind and Alpine

Tailwind 3.4.19 was already installed for this project. The generated CSS is committed, so viewing the site does not require Node.js or a running Tailwind process.

After changing Tailwind classes, run from the project root:

```sh
npm run build:css
```

During development you can instead run:

```sh
npm run watch:css
```

The watch command rebuilds the stylesheet when a view changes; refresh the browser to see the result. This project does not use Laravel Vite or automatic browser reload.

For a fresh dependency installation, use `npm ci`. On systems sharing the same checkout, rebuild dependencies on that OS only if the existing CLI fails. Do not upgrade to Tailwind 4 as part of this assignment: this configuration uses the Tailwind 3 CLI and directives.

`resources/css/input.css` contains the Tailwind directives and the `x-cloak` rule. `tailwind.config.js` scans PHP files in `app/views/`, retains the `tw-` prefix, and defines Inter with Arial and sans-serif fallbacks. Inter is loaded from Google Fonts, so offline viewing uses the fallback font.

Alpine 3.14.9 is served locally from `public/js/alpine-3.14.9.min.js`; its license is alongside it. Bootstrap and Popper are no longer loaded by the templates. Older Bootstrap assets are retained to avoid deleting the earlier class work.

The navbar has separate state for the profile dropdown and mobile links. The shared header opens the page and `main`, and the footer closes them after each page view. The database query remains in `Jet_model`, the controller supplies data, and the jet view escapes text with `htmlspecialchars()`.

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
- `BASEURL` is detected from the request path. Use `MVC_BASEURL` for a local override when needed.

## Author

Emmanuel ([@Sragastiya](https://github.com/Sragastiya)), Software Engineering student at Politeknik Negeri Bali.

## Acknowledgements

Structure and approach follow the lecturer's MVC course manuals, reimplemented in my own words.
