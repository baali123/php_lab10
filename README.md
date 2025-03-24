# Well Operation Management System

A Laravel-based CRUD application for managing oil well operations.

## Project Overview

This application allows oil and gas companies to track and maintain data related to oil wells, including:

-   Registration of new wells
-   Listing and viewing existing wells
-   Updating production or status information
-   Deletion of decommissioned or erroneous entries

## Setup Instructions

1. Clone the repository
2. Configure your `.env` file with appropriate database credentials
3. Run `composer install`
4. Run `php artisan migrate`
5. Serve the application with `php artisan serve`

## Available Routes

-   `GET /wells` - Display list of all wells
-   `GET /wells/create` - Show form to create a new well
-   `POST /wells` - Store a new well
-   `GET /wells/{well}` - Display a specific well
-   `GET /wells/{well}/edit` - Show form to edit a well
-   `PUT/PATCH /wells/{well}` - Update a well
-   `DELETE /wells/{well}` - Delete a well

## Screenshots

[Include screenshots of your application here]

## Technologies Used

-   Laravel 10
-   MySQL
-   Bootstrap 5
-   Eloquent ORM
-   Blade Templates
