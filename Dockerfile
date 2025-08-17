FROM php:7.4-fpm

# 引数でUID/GIDを受け取る
ARG USER_ID=1000
ARG GROUP_ID=1000

# 作業ディレクトリを設定
WORKDIR /var/www

# システムの依存関係をインストール
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nodejs \
    npm \
    sudo

# PHP拡張機能をインストール
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Redis拡張機能をインストール
RUN pecl install redis && docker-php-ext-enable redis

# Composerをインストール
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ユーザーとグループを作成
RUN groupadd -g ${GROUP_ID} laravel && \
    useradd -u ${USER_ID} -g laravel -m -s /bin/bash laravel && \
    usermod -a -G www-data laravel

# アプリケーションファイルをコピー
COPY . /var/www

# 権限を設定
RUN chown -R laravel:laravel /var/www \
    && chmod -R 755 /var/www/storage

# laravelユーザーに切り替え
USER laravel

# Composerの依存関係をインストール
RUN composer install --no-dev --optimize-autoloader

# NPMの依存関係をインストールしてビルド
RUN npm install && npm run production

EXPOSE 9000
CMD ["php-fpm"]
