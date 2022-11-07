# System Login Permission

Login system and simple access level.

# Version System

**PHP:** 8.1 <br/>
**Laravel:** 9 <br/>
**Banco de Dados:** MySQL <br/>

# Info

The project was developed using the Laravel framework and Mysql database.

# Instructions

Git Init repository

```bash

# clone the repo
$ git clone https://github.com/Gabe-Siqueira/system-login-permission.git

# go into app's directory
$ cd system-login-permission

```

You can install the package via composer:

```bash

# install app's dependencies
$ composer install

```

Start application database structure:

```bash

# create database tables
$ php artisan migrate --database=mysql

#insert basic data for the application
$ php artisan db:seed

```

Generate keys needed for the application:

```bash

# generate application key
$ php artisan key:generate

# generate jwt key
$ php artisan jwt:secret

```

start application services:

```bash

# start serve
$ php artisan serve --port=8000

```

Open the browser and enter the path in the 'php-registration-system' folder:

```bash

# browser
$ http://localhost:8000/

```

# Remember if

Change connection class information:

```bash

# path
.env.php

```

# Login

```bash
root@root.com 
admin@admin.com 
user@user.com 

```

```bash

P@ssw0rd

```

# Menu

Save this in link field in the create menu:

```bash

user.index
menu.index
permission.index
course.index
category.index
file.index

```

# Contact
- **Author**: Gabriel Siqueira
- **E-mail**: gabriel.snsilva2@gmail.com
- **Linkedin**: https://www.linkedin.com/in/gabriel-siqueira-904b67180
