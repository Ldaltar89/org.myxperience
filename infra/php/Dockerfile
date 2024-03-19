FROM php:8.2-fpm

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip gzip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

WORKDIR /var/www/symfony_docker

RUN apt install -y nodejs npm
RUN curl -sL https://dl.yarnpkg.com/bin/yarn/1.22.10/yarn-v1.22.10-linux-x64.tar.gz | tar -xvzf - -C /usr/local/bin && ln -s /usr/local/bin/yarn-v1.22.10-linux-x64/yarn /usr/local/bin/yarn
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony
RUN git config --global user.email "alexanderwspenafiel@gmail.com" \ 
    && git config --global user.name "Alexander Samaniego"


