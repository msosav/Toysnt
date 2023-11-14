FROM php:8.1.4-apache
RUN apt-get update -y && apt-get install -y openssl zip unzip git 
RUN docker-php-ext-install pdo_mysql
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /var/www/html
COPY ./public/.htaccess /var/www/html/.htaccess
WORKDIR /var/www/html
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist
    
COPY .env.example .env
ARG DB_HOST
ARG DB_DATABASE
ARG DB_PASSWORD
ARG GCP_KEY_FILE
ARG GCP_BUCKET
ENV DB_HOST=${DB_HOST}
ENV DB_DATABASE=${DB_DATABASE}
ENV DB_PASSWORD=${DB_PASSWORD}
ENV GCP_KEY_FILE=$(GCP_KEY_FILE)
ENV GCP_BUCKET=$(GCP_BUCKET)
RUN php artisan key:generate
RUN chmod -R 777 storage
RUN php artisan storage:link
RUN a2enmod rewrite
RUN service apache2 restart

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
