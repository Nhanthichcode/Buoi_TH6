FROM php:8.1-apache

# Cài đặt MySQLi
RUN docker-php-ext-install mysqli

# Copy mã nguồn vào container
COPY . /var/www/html

# Mở cổng 80 để container hoạt động
EXPOSE 80

# Chạy Apache
CMD ["apachectl", "-D", "FOREGROUND"]