# Scraper2.0

## Setup

### For local development

#### First time Setup

```bash
# Clone the repository to your device.
git clone https://github.com/Ismail020/Scraper2.0.git

# Copy the .env.example and change the copied file name to .env
cp .env.example .env

# Install composer packages with
composer install

# Generate an app key (dont use on production or staging)
php artisan key:generate

# Link the storage
php artisan storage:link

# ! When you are done with setting up the .env file proceed

# Add a local database matching DB_DATABASE in .env — default: 'laravel'

# Migrate and seed the tables to your database
php artisan migrate:fresh --seed

#### Start Environment
php artisan serve
```

##### Database

Add the right database credentials in the `.env` file

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
