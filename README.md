# TUNE Coding Challenge

This project is based on tune coding challenge.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

What things you need to install the software and how to install them

```
Xampp installed
php v-4
```

### Installing

Git clone, or download this code and put it in htdocs

Run composer install in cmd

```
composer install
```

After composer install make sure that the .env file is present. 
Run command php artisn key:generate.
```
php artisn key:generate
```

Create database in phpmyadmin
Edit the .env file in the project folder and add the database name, user and password set
Run php artisan migrate 

```
php artisan migrate
```

After migration run php artisan db:seed, to add all the data from json files to database

```
php artisan db:seed
```
This process can take a long time, so I have added the sql file in the root folder of this project for the user to directly import it in the database

Depending on user preference either run php artisan serve, or setup the virtual host https://medium.com/d6-digital/create-virtual-host-for-apache-on-windows-10-by-using-xampp-8664b0427567

## Classes
User and Logs Model was created and has functions to determine the relationship between the two model. The relationship is one user has many logs.

## Controller
UserController has two methods, one to load the index page, and the other to get json data for the charts.

## Views
The view is in resources/views/users/index.blade.php, it has all the view level code and the javascript used to make the charts for individual users. The ajax call gets data from the route users/charts and sets the charts.

## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Chartjs](https://maven.apache.org/) - Charts

## Authors

* **Sarmad Ahmed Khalil** - *Initial work* 
