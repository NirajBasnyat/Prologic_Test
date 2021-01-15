# Basic Test for Prologic 
## Follow these steps to install this system

**Clone the repo**

    git clone https://github.com/NirajBasnyat/Prologic_Test.git

**To add php dependencies(vendor)** 

    composer install
    
 **To add javascript dependencies(node modules)**
 
    npm install

**Copy Environment file**

    cp .env.example .env

**After the database is setup in env; Migrate table and seed data**

    php artisan migrate --seede
    
**Run the server** 

    php artisan serve

**To make file system work** 

    php artisan storage:link

**To run tests** 

    php vendor/phpunit/phpunit/phpunit


