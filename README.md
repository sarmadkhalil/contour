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

## Running the tests

Explain how to run the automated tests for this system

### Break down into end to end tests

Explain what these tests test and why

```
Give an example
```

### And coding style tests

Explain what these tests test and why

```
Give an example
```

## Deployment

Add additional notes about how to deploy this on a live system

## Built With

* [Dropwizard](http://www.dropwizard.io/1.0.2/docs/) - The web framework used
* [Maven](https://maven.apache.org/) - Dependency Management
* [ROME](https://rometools.github.io/rome/) - Used to generate RSS Feeds

## Contributing

Please read [CONTRIBUTING.md](https://gist.github.com/PurpleBooth/b24679402957c63ec426) for details on our code of conduct, and the process for submitting pull requests to us.

## Versioning

We use [SemVer](http://semver.org/) for versioning. For the versions available, see the [tags on this repository](https://github.com/your/project/tags). 

## Authors

* **Billie Thompson** - *Initial work* - [PurpleBooth](https://github.com/PurpleBooth)

See also the list of [contributors](https://github.com/your/project/contributors) who participated in this project.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* Hat tip to anyone whose code was used
* Inspiration
* etc
