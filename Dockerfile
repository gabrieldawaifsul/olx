FROM php:8.2-apache
RUN docker-php-ext-install mysqli 
RUN echo "ServerName localhost:80" >> /etc/apache2/apache2.conf