FROM php:8.3-fpm

ARG NODE_VERSION=20

WORKDIR /var/www/html

# Устанавливаем зависимости для работы с PHP и Excel
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    jpegoptim optipng pngquant gifsicle \
    git \
    curl \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    zlib1g-dev   # Это добавляем для zip расширения

# Установка расширений PHP
RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd soap zip # Добавляем "zip" сюда

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Установка Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установка Node.js
RUN curl -sLS https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

RUN docker-php-ext-install pdo_pgsql mbstring exif pcntl bcmath gd soap

RUN groupadd --force -g 1000 www-data

COPY . /var/www

RUN chown -R 775 /var/www/html
RUN chmod -R 775 /var/www/html

EXPOSE 9000
CMD ["php-fpm"]
