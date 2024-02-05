# blog-microservice

The simple microservice-based web application that allows users to
create and manage a list of blog posts.

- Docker installed via Laradock Package (https://laradock.io/)

Installation Steps:
1. Create config files to point to different project directory when visiting different domains. For Nginx go to nginx/sites

    file: `blog.localhost.conf`

    `...
    server_name blog.localhost;
    root /var/www/blog/public;
    ...`

    file: `notification.localhost.conf`
    
    `...
    server_name notification.localhost;
    root /var/www/notification/public;
    ...`

2. Add the domains to the hosts files.

   `...
   127.0.0.1  blog.localhost
   127.0.0.1  notification.localhost
   ...`

3. Build the Docker container `docker-compose up -d nginx mysql rabbitmq`
4. `composer install` on each services
5. `copy .env file from .env.example`
6. run `php artisan migrate` on each services
7. make `php artisan queue:work` 

The Postman collection you can find via following link: https://documenter.getpostman.com/view/580659/2s9YyweK4R

# possible issues:
- After "php artisan migrate" if error happen like: `SQLSTATE[HY000] [2002] No such file or directory` -> change DB_HOST=mysql in .env file
- In case of `The stream or file "/var/www/storage/logs/laravel.log" could not be opened: failed to open stream: Permission denied` issue -> change permissions of services into laradock:laradock (ex. sudo chown -R laradock:laradock blog)