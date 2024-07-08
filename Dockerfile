# Usar a imagem oficial do PHP com Apache
FROM php:7.4-apache

# Instalar extensões do PHP necessárias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite para CodeIgniter
RUN a2enmod rewrite

# Configurar o Apache para usar mod_rewrite
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Copiar o código do projeto para o diretório raiz do Apache
COPY . /var/www/html

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Dar permissões corretas ao diretório
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Adicionar permissões de escrita no diretório específico onde mkdir é usado
RUN mkdir -p /var/www/html/some/directory && chown -R www-data:www-data /var/www/html/some/directory

EXPOSE 80
