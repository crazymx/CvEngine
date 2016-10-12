FROM php:7.0.11-alpine

RUN apk add --no-cache --virtual .build-dependencies autoconf g++ make openssl-dev \
    && pecl install mongodb-1.1.8 \
    && docker-php-ext-enable mongodb \
    && apk del .build-dependencies

WORKDIR "/tmp"

RUN curl -O https://getcomposer.org/composer.phar \
    && mv composer.phar /usr/local/bin/composer \
    && chmod +x /usr/local/bin/composer \
    && composer global require "hirak/prestissimo:^0.3"

ADD . /cvengine

WORKDIR "/cvengine/api"

RUN composer install

CMD ["php", "-S", "0.0.0.0:80", "web/index.php"]