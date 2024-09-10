FROM php:8.1-apache
RUN apt-get update && apt-get install -y \
    unixodbc-dev \
    libgssapi-krb5-2 \
    && pecl install sqlsrv pdo_sqlsrv \
    && docker-php-ext-enable sqlsrv pdo_sqlsrv
COPY ./index.php /var/www/html/