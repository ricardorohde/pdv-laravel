docker rm -f pdv-texas-burguer && 

docker run -d -p 80:80 \
-v /home/samuel/Samfy/projetos/pdv/pdv-texas-burguer/:/var/www/html \
--name pdv-texas-burguer \
--link db-mysql:db-mysql \
jadermoura/php-apache:7.3.4
