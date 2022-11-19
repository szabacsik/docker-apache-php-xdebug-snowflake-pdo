FROM php:apache
RUN echo "Europe/Budapest" > /etc/timezone && dpkg-reconfigure -f noninteractive tzdata
RUN /usr/sbin/a2enmod rewrite && /usr/sbin/a2enmod headers && /usr/sbin/a2enmod expires
#System update
RUN apt update && \
    apt upgrade -y && \
    apt full-upgrade -y
RUN apt-get install -y \
    libzip-dev \
    ca-certificates \
    zip
RUN docker-php-ext-install \
    mysqli \
    pdo \
    pdo_mysql \
    zip
RUN pecl install xdebug && docker-php-ext-enable xdebug
RUN curl https://getcomposer.org/download/latest-stable/composer.phar --output /usr/local/bin/composer && \
    chmod +x /usr/local/bin/composer
COPY install-snowflake-pdo.sh /tmp
RUN bash -c "/tmp/install-snowflake-pdo.sh"
