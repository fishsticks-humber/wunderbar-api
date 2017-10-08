# Wunderbar API
This is the source code of the Wunderbar API. It is built in PHP using Laravel. 

## Getting Started for Development 
1. Install PHP 7.x on your laptop 
2. Install [Composer](https://getcomposer.org/doc/00-intro.md#installation-windows) 
3. Install Laravel  
```composer global require "laravel/installer"```
4. Clone the repository  
```git clone https://github.com/fishsticks-humber/wunderbar-api.git```  
5. Go to repository  
```cd wunderbar-api```  
6. Create a your environment variable file from the example  
    * For Windows  
    ```copy .env.example .env```  
    * For Linux/macOS  
    ```cp .env.example .env```  
7. Add your database details and API details to your `.env` file  
```
# All your sql database details should go here
DB_CONNECTION=mysql
DB_HOST=<your database port. it's usually 127.0.0.1>
DB_PORT=<your db port. it's usally 3306>
DB_DATABASE=<your datebase name>
DB_USERNAME=<your database username>
DB_PASSWORD=<your database password>

# Details for Yelp API
YELP_CLIENT_ID=<add your yelp client id here>
YELP_CLIENT_SECRET=<add your yelp client secret here>
```  
8. Install all composer dependencies  
```composer install```
9. Update composer lock file  
```composer update```
10. To start the development server  
```php artisan serve```
