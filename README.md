<p align="center"><a href="" target="_blank"><img src="https://github.com/AJ753159/health/blob/master/public/pathology/Logo-removebg-preview.png" width="400"></a></p>

## About Health Record Management System

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x)

Clone the repository

    git clone https://github.com/AJ753159/health.git

Switch to the repo folder

    cd HEALTH

Install all the dependencies using composer

    composer install

Copy the env file and make the required configuration changes in the .env file

    cp .env

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000
    
**Make sure you set the correct database connection information before running the migrations** [Environment variables](#environment-variables)

    php artisan migrate
    php artisan serve
----------

# Code overview

## Folders

- `app` - Contains all the Eloquent models
- `app/Http/Controllers/PatientController` - Contains all the Patients controllers
- `app/Http/Controllers/registerController` - Contains all the Staffs controllers
- `app/Http/Middleware` - Contains the necessary middleware used in project
- `app/Http/Models` - Contains the necessary Models used in project
- `config` - Contains all the application configuration files
- `database/factories` - Contains the model factory for all the models
- `database/migrations` - Contains all the database migrations
- `public/image` - Contains all the images uploaded by the staffs
- `public/pathology` - Contains all the images used in website
- `public/report` - Contains all the PDF files of report uploaded by the staffs
- `resources/views` - Contains all the blade.php files
- `routes/web` - Contains all the routes defined in views file


## Environment variables

- `.env` - Environment variables can be set in this file

***Note*** : You can quickly set the database information and other variables in this file and have the application fully working.

----------

# Testing Web

Run the laravel development server

    php artisan serve
