# How to Run

Before you start, make sure you have:

- Node.js 20 or higher installed
- PHP 8.2 or higher installed
- Composer installed
- MySQL Server is running
- A web server (such as Nginx or Apache) is running

To get started, clone the repository:

- `git clone https://github.com/adzaky/inventorify-laravel`

Then, you can run the following commands:

1. Navigate to the project directory:

    ```bash
    cd inventorify-laravel
    ```

2. Copy the example environment file and configure the database:

    ```bash
    cp .env.example .env
    ```

3. Generate the application key:

    ```bash
    php artisan key:generate
    ```

4. Install dependencies and build the application:

    ```bash
    npm i && npm run build
    ```

5. Install PHP dependencies:

    ```bash
    composer install
    ```

6. Run the development server:

    ```bash
    composer run dev
    ```

The application should now be running at:  
**[http://127.0.0.1:8000](http://127.0.0.1:8000)**

And you're good to go!

---
