# MS Supplements

An academic sports nutrition storefront featuring a product catalog, product details, search, a browser-based cart, and demo account and checkout flows.

## Features

- Responsive storefront built with HTML, CSS, and JavaScript.
- Product catalog with live search.
- Shopping cart stored in `localStorage`.
- PHP registration and sign-in backed by MySQL.
- Product pages for egg white protein, BCAA, creatine, glutamine, thermogenic supplements, and whey protein.

## Tech stack

HTML5 · CSS3 · JavaScript · PHP · MySQL

## Run locally

1. Install PHP with the `mysqli` extension and install MySQL.
2. Copy `.env.example` to `.env` and add your local database credentials. The `.env` file is ignored by Git.
3. Create the database and tables by running [`database/schema.sql`](database/schema.sql) in MySQL.
4. Start the PHP development server from the project root:

   ```bash
   php -S localhost:8000
   ```

5. Open <http://localhost:8000>.

Account registration and sign-in require PHP and a working MySQL connection. Static pages can also be previewed in a browser.

## Project structure

```text
.
├── index.html                    # Storefront home page
├── catalog.html                  # Product catalog and search
├── *-page.html                   # Product detail pages
├── sign-in.html / sign-up.html   # Account forms
├── account.php                   # Signed-in account details
├── cart.php                      # Shopping cart
├── checkout.html                 # Demo checkout
├── database/
│   ├── schema.sql                # Fresh-install database schema
│   └── migrations/               # Database migrations
├── scripts/
│   ├── style.css                 # Shared styles
│   ├── cart.js                   # Browser cart behavior
│   ├── search-bar.js             # Catalog search
│   └── registerScripts/          # Account and form scripts
└── img/                          # Store imagery and icons
```

## Notes

- Checkout is a visual demo and does not process payments. Do not enter real payment details.
- Configure database credentials with environment variables. Never commit `.env`.
- Product listings and prices are sample content for an academic project.

## License

No license has been defined. Contact the author before reusing the source code or visual assets.
