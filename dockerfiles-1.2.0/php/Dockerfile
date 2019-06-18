FROM php:7.1-fpm-alpine3.9

MAINTAINER 271648298@qq.com


# install redis
 RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.aliyun.com/g' /etc/apk/repositories \
    && apk update \
	&& apk add --no-cache libmcrypt-dev freetype-dev libjpeg-turbo-dev \
	&& docker-php-ext-install mcrypt pdo_mysql \
	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --with-png-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
	&& mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/3.1.6.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis
