FROM yiisoftware/yii2-php:7.3-apache

#php extensions & packages
RUN apt-get update && \
    apt-get -y install \
    libldap2-dev \
    --no-install-recommends && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/
RUN docker-php-ext-install ldap

#active directory
COPY ldap.conf /etc/ldap/ldap.conf
COPY cert.pem /etc/ssl/certs/cert.pem
