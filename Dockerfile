# Використовуємо останню версію PHP з підтримкою FPM
FROM php:8.2-fpm

# Встановлюємо залежності
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql exif pcntl bcmath gd

# Встановлюємо Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Налаштовуємо робочий каталог
WORKDIR /var/www

# Копіюємо проект
COPY . /var/www

# Встановлюємо права доступу
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

RUN chmod -R 775 /var/www/storage /var/www/bootstrap/cache \
    && chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Виставляємо команду за замовчуванням
CMD ["php-fpm"]

USER root

