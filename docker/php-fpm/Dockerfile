FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    nano \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    unzip \
    sqlite3 \
    coreutils \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR ./var/www

COPY . ./var/www

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini" && \
  sed -E -i -e 's/max_execution_time= 30/max_execution_time = 120/' "$PHP_INI_DIR/php.ini" && \
  sed -E -i -e 's/memory_limit= 128M/memory_limit = 512M/' "$PHP_INI_DIR/php.ini" && \
  sed -E -i -e 's/post_max_size = 8M/post_max_size = 64M/' "$PHP_INI_DIR/php.ini" && \
  sed -E -i -e 's/upload_max_filesize= 2M/upload_max_filesize= 64M/' "$PHP_INI_DIR/php.ini"

RUN pecl install xdebug && docker-php-ext-enable xdebug
