FROM php:8.5-fpm-alpine

# ─── System deps ─────────────────────────────────────────────────────────────
RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    icu-dev \
    libzip-dev \
    libpq-dev

# ─── PHP extensions ──────────────────────────────────────────────────────────
RUN docker-php-ext-install \
    intl \
    zip \
    pdo_pgsql

# ─── Composer ────────────────────────────────────────────────────────────────
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# ─── Symfony CLI (méthode officielle) ────────────────────────────────────────
RUN curl -sS https://get.symfony.com/cli/installer | bash \
 && mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/html

EXPOSE 9000

CMD ["php-fpm"]