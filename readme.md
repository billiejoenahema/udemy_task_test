# Laravel Docker 環境

このプロジェクトを Docker で実行するためのセットアップガイドです。

## 必要な環境

-   Docker
-   Docker Compose

## セットアップ手順

### 1. 自動セットアップ（推奨）

```bash
# セットアップスクリプトを実行可能にする
chmod +x docker-setup.sh

# セットアップを実行
./docker-setup.sh
```

### 2. 手動セットアップ

```bash
# 1. 環境設定ファイルをコピー
cp .env.docker .env

# 2. Dockerコンテナをビルドして起動
docker-compose up -d --build

# 3. Composerの依存関係をインストール
docker-compose exec app composer install

# 4. アプリケーションキーを生成
docker-compose exec app php artisan key:generate

# 5. ストレージリンクを作成
docker-compose exec app php artisan storage:link

# 6. データベースマイグレーションを実行
docker-compose exec app php artisan migrate
```

## アクセス

-   **アプリケーション**: http://localhost:8081
-   **データベース**: localhost:3306
    -   ユーザー: laravel
    -   パスワード: root
    -   データベース: laravel
-   **Redis**: localhost:6379

## よく使うコマンド

```bash
# コンテナを起動
docker-compose up -d

# コンテナを停止
docker-compose down

# ログを確認
docker-compose logs -f

# アプリケーションコンテナに入る
docker-compose exec app bash

# Artisanコマンドを実行
docker-compose exec app php artisan [command]

# Composerコマンドを実行
docker-compose exec app composer [command]

# NPMコマンドを実行
docker-compose exec app npm [command]
```

## 開発時の注意点

-   ファイルの変更は自動的にコンテナに反映されます
-   データベースのデータは永続化されます
-   `storage`と`bootstrap/cache`ディレクトリの権限に注意してください

## トラブルシューティング

### 権限エラーが発生した場合

```bash
# ストレージディレクトリの権限を修正
docker-compose exec app chown -R www-data:www-data /var/www/storage
docker-compose exec app chmod -R 755 /var/www/storage
```

### データベース接続エラーが発生した場合

```bash
# データベースコンテナの状態を確認
docker-compose logs db

# データベースコンテナを再起動
docker-compose restart db
```
