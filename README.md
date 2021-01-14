# Basic Test for Prologic 
## Follow these steps to install this system

**Clone the repo**

    git clone https://github.com/NirajBasnyat/Prologic_Test.git

**To add composer.json (php dependencies)** 

    composer install
    
 **To add Package.json (javascript dependencies)**
 
    npm install

**Copy Environment file**

    cp .env.example .env

**After the database is setup in env migrate table and seed data**

    php artisan migrate --seed
    
**Run the server** 

    php artisan serve


