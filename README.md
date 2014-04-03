laravelCashier
==============

Laravel cashier article project files for SitePoint

- [Installation](#installation)

<a name="installation"></a>
## Installation
To install the project simply run:

```
//clone the repo
git clone git@github.com:Whyounes/laravelCashier.git

//install the dependencies
composer install

//update your `config/database.php` with your database credentials, then migrate the table to the database
php artisan migrate

//seed the database
php artisan db:seed --class='PostsTableSeeder'
```
then you need to modify `config/services.php` with your Stripe API key.

You can run `php artisan serve` and create a new account to test the app.