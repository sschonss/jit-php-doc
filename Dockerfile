FROM php:8.0.3-cli

RUN apt-get update && apt-get install -y

COPY index.php /var/www/html/index.php

WORKDIR /var/www/html

CMD ["php", "index.php", "jit"]