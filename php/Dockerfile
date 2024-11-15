FROM php:8.1-apache

RUN docker-php-ext-install pdo pdo_mysql

# Copia o arquivo de configuração do Apache (opcional)
# COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

EXPOSE 80