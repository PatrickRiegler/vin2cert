FROM php:7-apache

#WORKDIR /var/www/html/

ENV AWS_ACCESS_KEY_ID=AKIAICE4JY4RBPHKOXWQ
ENV AWS_SECRET_ACCESS_KEY=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

RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip unzip

RUN groupadd apache && \
    useradd -d /var/www/html -g apache apache && \
    mkdir /var/www/html/image2text && \
    chown -R apache:apache /var/www/html

COPY ./*.json /var/www/html/
RUN chown -R apache:apache /var/www/html

RUN su apache -c "curl --silent --show-error https://getcomposer.org/installer | php" && \
	su apache -c "php composer.phar install"

RUN a2enmod headers

COPY ./.htaccess /var/www/html/image2text

COPY ./*.php /var/www/html/image2text/
RUN chown -R apache:apache /var/www/html/image2text


