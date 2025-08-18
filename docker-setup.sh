#!/bin/bash

echo "Laravel Docker環境をセットアップしています..."

# .envファイルをコピー
if [ ! -f .env ]; then
    cp .env.docker .env
    echo ".envファイルを作成しました"
fi

# Dockerコンテナをビルドして起動
docker-compose up -d --build

echo "コンテナの起動を待っています..."
sleep 10

# Composerの依存関係をインストール
docker-compose exec app composer install

# アプリケーションキーを生成
docker-compose exec app php artisan key:generate

# ストレージリンクを作成
docker-compose exec app php artisan storage:link

# データベースマイグレーションを実行
docker-compose exec app php artisan migrate

echo "セットアップが完了しました！"
echo "アプリケーションは http://localhost:8080 でアクセスできます"
