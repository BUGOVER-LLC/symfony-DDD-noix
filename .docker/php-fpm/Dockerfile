FROM php:8.3-fpm-alpine

# Install dev dependencies
RUN apk update \
    && apk upgrade --available \
    && apk add --virtual build-deps \
        linux-headers \
        autoconf \
        build-base \
        libc-dev \
        yaml-dev \
        icu-dev \
        libevent-dev \
        openssl-dev \
        libzip \
        libzip-dev \
        zlib \
        zlib-dev \
        bzip2 \
        git \
        libpng \
        libpng-dev \
        libjpeg \
        libjpeg-turbo-dev \
        libwebp-dev \
        freetype \
        freetype-dev \
        postgresql-dev \
        curl \
        wget \
        oniguruma-dev \
        gcc \
        make \
        libc-dev \
        libpq-dev \
        libxml2-dev \
        librdkafka-dev \
        bash

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/
RUN docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) \
    intl \
    gd \
    bcmath \
    pcntl \
    pdo \
    pdo_pgsql \
    sockets \
    opcache \
    zip

# Pecl packages
RUN pecl channel-update pecl.php.net && pecl install -o -f \
    xdebug \
    redis \
    yaml \
    igbinary \
    mongodb \
    event \
    apcu \
    rdkafka

RUN echo "extension=rdkafka.so" >/usr/local/etc/php/conf.d/docker-php-ext-rdkafka.ini
RUN echo "extension=event.so" >/usr/local/etc/php/conf.d/docker-php-ext-event.ini

# Xdebug
ARG ENABLE_XDEBUG
RUN if [ ${ENABLE_XDEBUG} = true ]; then \
    docker-php-ext-enable xdebug; \
fi

COPY ./.docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
COPY ./.docker/php-fpm/apcu.ini /usr/local/etc/php/conf.d/docker-php-ext-apcu.ini

RUN docker-php-ext-enable \
    yaml \
    igbinary \
    mongodb \
    event \
    apcu \
    rdkafka \
    redis

# Configure non-root user.
ARG PUID=1000
ARG PGID=1000
RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

# Source code
COPY ./ /var/www
WORKDIR /var/www

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#RUN composer install --no-interaction

CMD php-fpm

EXPOSE 9000
