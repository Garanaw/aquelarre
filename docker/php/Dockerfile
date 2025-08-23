FROM php:8.4.11-fpm as app

ARG WWWGROUP
ARG WWWUSER
ARG NODE_VERSION=22

ENV SUPERVISOR_PHP_USER="sail"

WORKDIR /var/www/html

ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN chmod +x /usr/local/bin/install-php-extensions

RUN apt-get update && apt-get upgrade -y && apt-get clean
RUN mkdir -p /etc/apt/keyrings \
    && apt-get install -y gnupg libbz2-dev wget gosu ca-certificates zip unzip git supervisor libcap2-bin libpng-dev python3 dnsutils librsvg2-bin fswatch \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0xb8dc7e53946656efbce4c1dd71daeaab4ad4cab6' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && echo "deb [signed-by=/etc/apt/keyrings/ppa_ondrej_php.gpg] https://ppa.launchpadcontent.net/ondrej/php/ubuntu noble main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update

RUN install-php-extensions bcmath calendar ctype
RUN install-php-extensions pcntl bz2
RUN install-php-extensions ftp
RUN install-php-extensions hash
RUN install-php-extensions curl
RUN install-php-extensions iconv
RUN install-php-extensions imap
RUN install-php-extensions intl
RUN install-php-extensions json ldap mbstring
RUN install-php-extensions odbc opcache redis
RUN install-php-extensions pdo pdo_dblib pdo_mysql
RUN install-php-extensions soap xml zip
RUN install-php-extensions gd
RUN install-php-extensions xdebug

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && apt-get update \
    && curl -sS 'https://keyserver.ubuntu.com/pks/lookup?op=get&search=0xb8dc7e53946656efbce4c1dd71daeaab4ad4cab6' | gpg --dearmor | tee /etc/apt/keyrings/ppa_ondrej_php.gpg > /dev/null \
    && apt-get update \
    && curl -sLS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -fsSL https://deb.nodesource.com/gpgkey/nodesource-repo.gpg.key | gpg --dearmor -o /etc/apt/keyrings/nodesource.gpg \
    && echo "deb [signed-by=/etc/apt/keyrings/nodesource.gpg] https://deb.nodesource.com/node_$NODE_VERSION.x nodistro main" > /etc/apt/sources.list.d/nodesource.list \
    && apt-get update \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && apt-get update \
    && apt-get install -y default-mysql-client \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

RUN apt-get update && apt-get install -y cron
RUN apt-get -y autoremove && apt-get clean

COPY "./docker/php/entrypoint.sh" /usr/local/bin/entrypoint.sh
COPY "./docker/php/supervisord.conf" /etc/supervisor/conf.d/supervisord.conf
COPY "./docker/php/php.ini" /usr/local/etc/php/conf.d/99-sail.ini
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["/bin/bash", "/usr/local/bin/entrypoint.sh"]
CMD ["php-fpm"]
