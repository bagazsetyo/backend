![image](https://github.com/bagazsetyo/backend/blob/master/public/img/laravue1.PNG)
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

#   Marketplace
BWA-LARAVEL : Travel, easy choose product in the marketplace, flexible.

**Features**
- Basic Features
    - Authentication for Admin, CRUD goods, Add to Cart, Checkouts, and Update Status Transaction. 

**What's in it?**
- Laravel 7.x
- Admin Tamplate
- Vue Tamplate
- Bootstrap

**Learning Laravel**

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

**Requirement**
-   mysql >= 7.3

#   Installation

Create a Database Table in phpMyAdmin

Open Code Editor → Terminal.

In Terminal, navigate to the extracted Oashier folder.
  ```$ cd backend```
  
Enter these commands one by one ,
  ```
  $ composer install
  $ npm install
  $ cp .env.example .env
  $ php artisan key:generate
  $ php artisan storage:link
  ```
Edit the .env file like this,
  ```
  DB_CONNECTION = mysql
  DB_HOST = 127.0.0.1 // change to Host your database
  DB_PORT = 3306
  DB_DATABASE = db_shayna // change to the name of the database table that you created
  DB_USERNAME = root // change to be your database username, default root
  DB_PASSWORD = ... // change to your databse password, null default 
  ```

## License

The Laravel framework is not open-sourced software licensed under the [BWA TEAMS](https://buildwithangga.com/).
