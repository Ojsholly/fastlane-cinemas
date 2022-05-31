# Fastlane Cinema Management System

## Project Description

The project is a minimalistic system for  creating and displaying movie schedules for the fastlane cinema. It was built with Laravel 9.11 for the API and Livewire 2.10 for the display.  

## Project Setup

### Cloning the GitHub Repository.

Clone the repository to your local machine by running the terminal command below.

```bash
git clone https://github.com/Ojsholly/fastlane-cinemas.git
```

### Setup Database

Create your MySQL database and note down the required connection parameters. (DB Host, Username, Password, Name)

### Install Composer Dependencies

Navigate to the project root directory via terminal and run the following command.

```bash
composer install
```

### Create a copy of your .env file

Run the following command

```bash
cp .env.example .env
```

This should create an exact copy of the .env.example file. Name the newly created file .env and update it with your local environment variables (database connection info, mailing credentials and others).

### Generate an app encryption key

```bash
php artisan key:generate
```
Also, update the application to run with any preferred queue driver of your choice.

### Run database migrations and seeders

```bash
php artisan migrate --seed
```

### Start Development Server

```bash
php artisan serve
```

The cinema dashboard can be accessed at http://127.0.0.1:8000/ and the admin module  can 
be found at http://127.0.0.1:8000/login.

The seeded credentials for the admin module are email -> admin@fastlane-cinemas.com and password -> password
### License

[MIT](https://choosealicense.com/licenses/mit/)
