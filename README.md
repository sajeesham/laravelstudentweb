# Requirements

* PHP 7.2.5+
* MySQL 5.6+
* composer

# Installation Process


First, clone this repository:

```bash
$ git clone -b master https://github.com/sajeesham/laravelstudentweb.git
```
Adjust .env file with database, username, and password

DATABASENAME = student
DB_USERNAME = root
DB_PASSWORD =


Then, run:

```bash
$ composer install
```

_Note :_ To Install dependencies.


```bash
$ php artisan migrate
```

_Note :_ To run all of your migrations ( create database schema).


```bash
$ php artisan storage:link
```

_Note :_ To create the symbolic link for storage.


# Local Development Server

Please run the command below to add settings

```bash
$ php artisan db:seed
```

Please run the command below to add admin and subject

```bash
$ php artisan db:seed --class=AdminAdd
```

Please run the command below
```bash
$ php artisan key:generate
```

Please run the command below
```bash
$ php artisan serve
```

# Login Credentials
Admin 
Username : admin@demo.com
Password : 123456789

#Contact
Phone : +91 9895363412

