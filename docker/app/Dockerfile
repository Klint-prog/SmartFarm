FROM php:7.4-fpm

ARG BUILD_DATE
ARG VCS_REF="local"

LABEL org.label-schema.build-date=$BUILD_DATE \
      org.label-schema.name="SmartFarm Web Application" \
      org.label-schema.description="Build artifact for SmartFarm" \
      org.label-schema.vcs-ref=$VCS_REF \
      org.label-schema.vcs-url="https://github.com/jhonatas/SmartFarm.git" \
      org.label-schema.vendor="SmartFarm" \
      org.label-schema.schema-version="1.0"

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
      nginx \
      supervisor \
      git \
      unzip \
      libicu-dev \
      libzip-dev \
    && docker-php-ext-install pdo pdo_mysql intl zip \
    && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# PHP-FPM to unix socket (compatible with nginx.conf)
RUN mkdir -p /var/run/php \
    && sed -ri 's!^listen = .*!listen = /var/run/php/php-fpm.sock!' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ri 's!^;listen.owner = .*!listen.owner = www-data!' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ri 's!^;listen.group = .*!listen.group = www-data!' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ri 's!^user = .*!user = www-data!' /usr/local/etc/php-fpm.d/www.conf \
    && sed -ri 's!^group = .*!group = www-data!' /usr/local/etc/php-fpm.d/www.conf

ADD . /var/www
COPY ./docker/app/nginx.conf /etc/nginx/nginx.conf
COPY ./docker/app/tania-entrypoint /usr/local/bin/
RUN chmod +x /usr/local/bin/tania-entrypoint

RUN cat > /etc/supervisor/conf.d/supervisord.conf <<'SUP'
[supervisord]
nodaemon=true

[program:php-fpm]
command=/usr/local/sbin/php-fpm --nodaemonize
autostart=true
autorestart=true
priority=5

[program:nginx]
command=/usr/sbin/nginx -g "daemon off;"
autostart=true
autorestart=true
priority=10
SUP

VOLUME /var/www/var/cache
WORKDIR /var/www
EXPOSE 80

RUN touch /var/www/.env \
    && COMPOSER_ALLOW_SUPERUSER=1 composer install --no-autoloader --no-scripts --no-dev || true

ENTRYPOINT ["/usr/local/bin/tania-entrypoint"]
