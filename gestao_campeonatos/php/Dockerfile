# Usa a imagem oficial do PHP com Apache
FROM php:8.2-apache

# Instalar as extensões PHP necessárias (por exemplo, MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar o mod_rewrite do Apache
RUN a2enmod rewrite

# Copiar arquivos do projeto para o diretório do Apache
COPY ./src /var/www/html/

# Expor a porta 80 (default do Apache)
EXPOSE 80