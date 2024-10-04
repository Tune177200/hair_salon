# Sử dụng PHP image từ Docker Hub
FROM php:8.1-fpm-buster

# Cài đặt các dependencies và extensions PHP cần thiết
RUN apt-get update && \
    echo "Update completed" && \
    apt-get install -y git curl libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libzip-dev unzip && \
    docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install pdo pdo_mysql mbstring zip gd && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

RUN apt-get update && apt-get install -y default-mysql-client


# Cài đặt Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Thiết lập thư mục làm việc
WORKDIR /var/www

# Copy mã nguồn Laravel vào container
COPY . /var/www

# Cài đặt các thư viện yêu cầu từ composer.json
RUN composer install

# Chmod quyền cho thư mục
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache

# Chạy PHP-FPM
CMD ["php-fpm"]
