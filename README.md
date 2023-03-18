# fruit_app
 
After cloning the project you have to run the following commands in terminal where project is located
- composer install
- composer update
- php bin/console doctrine:migrations:migrate (for all the migrations)
- DATABASE_URL="mysql://root:@127.0.0.1:3306/fruit_app" (write the path of your DB here in .env)
- MAILER_DSN=smtp://user:pass@smtp.example.com:port (Add you email credentials here so that emails can work)
- symfony server:start (to start the symfony server)


# TO IMPORT ALL THE FRUITS FROM https://fruityvice.com/ run the following command
- php bin/console import-fruits