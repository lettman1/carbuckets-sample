# CarBucket Book

Create bookstore api

## Requirements

- Laravel
- Composer
- npm
- .env.example APP_PATH_URL=localhost/carbuckets-sample/public is required and used for navigation and should not include https:// or http://

## Setup

On the repo has been downloaded run the commands below 

- composer install
- npm install
- npm run dev
- php artisan migrate
- php artisan db:seed


## Features

- Users can view the book details.
- Users can borrow books and retrieve the borroed book details.
- Managers can add new, update details, or remove books.
- At least 3 Tests
    - Must set APP_ENV=testing to test