FROM php:8.2-fpm-alpine

WORKDIR /var/www

USER root

RUN apk --update add \
	linux-headers \
	icu-dev \
	libpq-dev \
	imagemagick-dev \
	imagemagick \
	freetype-dev \
	libjpeg-turbo-dev \
	libpng-dev \
&& apk --update --no-cache add \
	autoconf \
	g++ \
	make \
&& pecl install \
	xdebug-3.3.2 \
	imagick-3.7.0 \
&& docker-php-ext-enable xdebug imagick \
&& docker-php-ext-configure intl \
&& docker-php-ext-configure gd --with-freetype --with-jpeg \
&& docker-php-ext-install \
	intl \
 	bcmath \
 	opcache \
 	pdo_pgsql \
 	-j$(nproc) gd \
&& apk del --purge \
	autoconf \
	g++ \
	make
	
RUN ["sh", "-c", "curl https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer"]

CMD ["php-fpm"]
