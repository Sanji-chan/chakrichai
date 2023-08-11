# chakrichai
CSE471 [System Analysis and Design] group project using Laravel (LAMP stack)

**Environment pre-requisites:**
1. php version 8.1 or above
1. composer version 2.2 or above
1. Xaamp

**Environment installations and setup:**

Open a new folder, and pull the file from git. Then, open terminal and run the following command to install npm, this is needed to run bootstap for the project ui.

```bash
npm install
```

Install sorting plugin
```bash
composer require kyslik/column-sortable
```

Install chatify for messaging

```bash
composer require munafio/chatify
php artisan chatify:install
```

Please note that you will need to set up the .env file with appropriate PUSHER credentials.

Migrate database and seed the tables, using the following commands:

```bash
php artisan migrate
php artisan db:seed --class=CreateUserSeeder
php artisan db:seed --class=ProfileSeeder
```

Find the .env_example file and rename to .env. Next, update your .env configuration file with appropriate database name.

To set up social login using google, install socialite package using:

```bash
composer require laravel/socialite
```
Next set up .env configuration file with GOOGLE_CLIENT_ID and GOOGLE_CLIENT_SECRET for google auth.

Then, set up smtp credentials in the .env configuration file for email verification and password reset.

Start server and run npm with the following commands:
```bash
php artisan serve
npm run dev
```

Finally, login details for each role are as follows:

emails: admin@chakrichai.com, buyer@chakrichai.com, seller@chakrichai.com
password: 123456
