FROM wordpress:5.2.4

ENV COMPOSER_ALLOW_SUPERUSER=1
ENV WP_CLI_CONFIG_PATH=/var/www/html/wp-content/plugins/community-fabricator/wp-cli.yml

RUN apt-get update \
 && apt-get install --no-install-recommends -y git zip unzip \
 && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
 && curl -sSo /usr/src/wp-cli.phar https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
 && echo '#!/bin/bash\nphp /usr/src/wp-cli.phar --allow-root "$@"' > /usr/local/bin/wp && chmod +x /usr/local/bin/wp \
 && chmod +x /usr/local/bin/wp && apt-get clean && rm -rf /tmp/* /var/tmp/* && rm -rf /var/lib/apt/lists/*

##
#RUN cp /usr/local/bin/apache2-foreground /usr/local/bin/apache2-foreground-inherit; \
#    { \
#        echo '#!/bin/bash'; \
#        echo '[[ "$1" = "community" ]] && { wp "$@"; exit; }'; \
#        echo 'apache2-foreground-inherit "$@"'; \
#    } > /usr/local/bin/docker-entrypoint.sh; \
#    cp /usr/local/bin/docker-entrypoint.sh /usr/local/bin/docker-entrypoint-inherit.sh; \
#    { \
#        echo '#!/bin/bash'; \
#        echo '[[ "$1" = "community" ]] && set -- wp "$@"'; \
#        echo 'docker-entrypoint-inherit.sh "$@"'; \
#    } > /usr/local/bin/docker-entrypoint.sh;
