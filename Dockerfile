FROM php:7-apache

RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip

RUN curl --silent --show-error https://getcomposer.org/installer | php

RUN groupadd apache && \
    useradd -d /var/www/html -g apache apache && \
    chown -R apache:apache /var/www/html

COPY ./*.json /var/www/html/
COPY ./*.php /var/www/html/
RUN chown -R apache:apache /var/www/html
RUN su apache -c "php composer.phar install --no-dev"

#WORKDIR /var/www/html/

