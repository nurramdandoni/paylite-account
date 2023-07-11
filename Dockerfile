# Gunakan gambar PHP dengan Apache dan PHP 8.1
FROM php:8.1-apache

# Aktifkan modul Apache yang diperlukan
RUN a2enmod rewrite

# Instal ekstensi PHP yang diperlukan
RUN apt-get update && apt-get install -y \
    libonig-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip

RUN docker-php-ext-configure intl
RUN docker-php-ext-install pdo pdo_mysql mbstring zip intl

# Setel direktori kerja di dalam kontainer
WORKDIR /var/www/html

# Salin seluruh kode proyek ke direktori kerja di dalam kontainer
COPY . /var/www/html

# Atur izin yang sesuai untuk direktori penyimpanan log
RUN chmod -R 777 writable

# Pasang dependensi menggunakan Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer update --no-dev

# Tampilkan port yang akan digunakan oleh kontainer
EXPOSE 8080

# Perintah untuk menjalankan server Apache dan CodeIgniter
CMD ["apache2-foreground"]
CMD ["php -v"]
CMD ["php", "spark", "serve"]