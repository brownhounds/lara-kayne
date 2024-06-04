FROM php:8.3.2-fpm-alpine
ARG APP_DIR=/var/www/app

RUN apk add --no-cache \
    freetype-dev \
    libjpeg-turbo-dev \
    libzip-dev \
    libpng-dev

RUN apk add --no-cache pcre-dev $PHPIZE_DEPS && \
    pecl update-channels && \
    pecl install redis && \
    docker-php-ext-enable redis && \
    apk del $PHPIZE_DEPS

RUN rm -rf /var/cache/apk/*

RUN docker-php-ext-install pdo pdo_mysql opcache pcntl gd bcmath posix zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN sed -i "s/user = www-data/user = root/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = root/g" /usr/local/etc/php-fpm.d/www.conf

WORKDIR $APP_DIR

EXPOSE 9000
CMD ["php-fpm", "--allow-to-run-as-root"]
