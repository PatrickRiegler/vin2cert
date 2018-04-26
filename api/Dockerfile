FROM php:7-apache

#WORKDIR /var/www/html/

RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip

RUN groupadd apache && \
    useradd -d /var/www/html -g apache apache && \
    mkdir /var/www/html/vin2cert && \
    chown -R apache:apache /var/www/html

COPY ./*.json /var/www/html/
RUN chown -R apache:apache /var/www/html

RUN su apache -c "curl --silent --show-error https://getcomposer.org/installer | php" && \
	su apache -c "php composer.phar install"

RUN a2enmod headers

COPY ./.htaccess /var/www/html/vin2cert

COPY ./*.php /var/www/html/vin2cert/
RUN chown -R apache:apache /var/www/html/vin2cert


