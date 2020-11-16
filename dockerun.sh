docker rm -f pdv-laravel && 

docker run -d -p 80:80 \
-v /home/samuel/Samfy/projetos/pdv/pdv-laravel/:/var/www/html \
--name pdv-laravel \
--link db-mysql:db-mysql \
jadermoura/php-apache:7.3.4
