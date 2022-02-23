FROM docker.ezcorp.io/web/base-php:v1.0.4
WORKDIR /app
COPY config/default.conf /etc/nginx/conf.d/default.conf
COPY app ./
RUN composer install --no-dev
RUN mkdir -p writable/cache && chmod -R 777 writable/ && chmod -R 777 public/
