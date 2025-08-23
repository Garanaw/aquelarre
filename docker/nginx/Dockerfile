FROM nginx:alpine

# Security packages
RUN apk update && apk upgrade

COPY ./docker/nginx/default.conf /etc/nginx/conf.d/default.conf
COPY . /var/www/html

RUN chown -R nginx:nginx /var/www/html/public && chmod -R 755 /var/www/html/public
RUN chown -R nginx:nginx /var/www/html/storage && chmod -R 755 /var/www/html/storage
RUN chown -R nginx:nginx /var/cache/nginx && chmod -R 755 /var/cache/nginx
RUN touch /var/run/nginx.pid && chown -R nginx:nginx /var/run/nginx.pid

USER nginx

EXPOSE 80
