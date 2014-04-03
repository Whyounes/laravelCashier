laravelCashier
==============

Laravel cashier article project files for SitePoint

- [Requirements](#requirements)
- [Installation](#installation)
- [How to test the functionalities](#functionalities)


<a name="requirements"></a>
## Requirements
- PHP 5.4

<a name="installation"></a>
## Installation
To install the project simply run:

```
//clone the repo
git clone git@github.com:Whyounes/laravelCashier.git

//install the dependencies
composer install

//update your `config/database.php` with your database credentials,
then migrate the table to the database
php artisan migrate

//seed the database
php artisan db:seed --class='PostsTableSeeder'
```
then you need to modify `config/services.php` with your Stripe secret API key and `views/signup.blade.php` with your publishable key.

You can run `php artisan serve` and create a new account to test the app.

<a name="functionalities"></a>
## Functionalities

To test the functionalities you can signup with some credentials:

plan: select a Basic plan first so you can test the upgrade functionality.
email: test@mail.com
password: yourpassword
card number: 4242 4242 4242 4242
expiration date: any date for testing is valid.
cvc: any three digits number is valid.

now you can login to the app and visit some posts. the post number '2' is reserved only for gold members.
You can upgrade your plan membership and then you will have access to the post.