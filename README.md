# Laravel Submissions API

This is a simple Laravel API for handling form submissions.

## Setup Instructions

1. Clone the repository:
   ```bash
   git clone https://github.com/Alireza2756/LaravelApiWithJobQueu.git
2. Install dependencies:
    ```bash
    composer install 
3. Configure your database in .env.
4. Migrate the database:
    ```bash
    php artisan migrate
5. Start the development server:
    ```bash
   php artisan serve

## Test
To run tests, use the following command:
```bash
    php artisan test
```

## Sample Usage

Once the server is running, you can send POST requests to the /api/submit endpoint with JSON data containing the submission details.

Example using cURL:
```bash
    curl --location 'http://127.0.0.1:8000/api/submit' \
    --header 'Content-Type: application/json' \
    --data-raw '{
    "name": "John Doe",
    "email": "john.doe@example.com",
    "message": "This is a test message."
    }'
   ``` 
    
## Production Server
For running on a production server:
```bash
nohup php artisan queue:work --daemon --queue=submission > /dev/null 2>&1 &
```
## License

This project is licensed under the [MIT License](LICENSE).
