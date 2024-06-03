FROM php:8.3.2-cli-alpine
ARG APP_DIR=/var/www/app

RUN apk add -Uuv \
    freetype-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    libpng-dev

RUN rm -rf /var/cache/apk/*

RUN docker-php-ext-install pdo pdo_mysql opcache pcntl gd bcmath posix zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR $APP_DIR

CMD ["tail", "-f", "/dev/null"]
