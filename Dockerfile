FROM php:8.1.1-fpm

# Arguments
ARG user=teste_app
ARG uid=1000

# Install system dependencies
RUN apt-get update \
        && apt-get install -y \
            git \
            curl \
            libpng-dev \
            libmcrypt-dev \
            libpq-dev \
            zlib1g-dev \
            openssl \
            zip \
            unzip \
        && docker-php-ext-install \
            pdo_pgsql \
            pgsql \
        && apt-get install -y \
            postgresql-client

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

# Install redis
RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

# Set working directory
WORKDIR /var/www

USER $user
