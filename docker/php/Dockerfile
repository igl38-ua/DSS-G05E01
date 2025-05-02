# Dockerfile (excerpt)
FROM php:8.3-fpm-alpine AS app

# 1. system deps only for the *extensions you really need to build*:
RUN apk add --no-cache \
        libpng-dev libjpeg-turbo-dev libwebp-dev freetype-dev \
        icu-dev oniguruma-dev zlib-dev sqlite-dev libxml2-dev \
        curl-dev g++ make autoconf

# 2. build the ones that are NOT already enabled
RUN docker-php-ext-configure gd \
        --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install -j$(nproc) \
        bcmath intl pdo_mysql gd \
 && docker-php-ext-enable opcache         

# 3. tidy up
RUN apk del g++ make autoconf
