# Person Management System

This Laravel application is a Person Management System that allows users to filter a dataset based on a person's birth year, birth month, or both. The application provides a user-friendly interface for viewing paginated results and includes features such as caching to improve performance.

## Features

- Filter people by birth year, birth month, or both
- Paginate results with 20 rows per page
- Cache filtered results in Redis for 60 seconds to improve performance
- Display results in a paginated table with Bootstrap 5 styling
- Provide custom pagination with previous, next, and total records count
- Optimize database schema to ensure queries to PostgreSQL do not take longer than 250ms

## Installation

1. **Clone the repository:** `git clone <https://github.com/Md-khaled/people-management>`
2. **Navigate to the project directory:** `cd people-management-system`
3. **Install Composer dependencies:** `composer install`
4. **Copy the `.env.example` file to `.env` and configure your environment variables like PostgreSQL or MySql and Redis:** `cp .env.example .env`
5. **Generate a new application key:** `php artisan key:generate`
6. **Run database migrations to create the necessary tables:** `php artisan migrate:fresh --seed`
    - Note: Please ensure that the CSV file is located inside the storage/app folder or add the CSV path to the CSV_PATH variable in the .env file. The file must be stored inside the storage folder; otherwise, the data will not be seeded.
7. **Serve the application:** `php artisan serve`

The application will be available at `http://localhost:8000`.

## Usage

- Visit the homepage of the application to view the list of people.
- Use the filters provided to filter the dataset based on birth year, birth month, or both.
- Paginate through the results using the navigation links at the bottom of the table.
- Results will be cached in Redis for 60 seconds, ensuring subsequent requests for the same filtering parameters do not query the database before the cache expires.

## Contributing

Contributions are welcome! If you find any issues or have suggestions for improvements, please open an issue or submit a pull request.

## License

This project is licensed under the [Khaled Mahmud](https://github.com/Md-khaled).
