---
inclusion: always
---

# Conventional Commits 強制ルール

このプロジェクトでは **Conventional Commits** 形式を厳格に遵守してください。

## 📋 必須フォーマット

```
<type>[optional scope]: <description>

[optional body]

[optional footer(s)]
```

## 🔧 許可されるタイプ

-   **feat**: 新機能の追加
-   **fix**: バグ修正
-   **docs**: ドキュメントのみの変更
-   **style**: コードの意味に影響しない変更（空白、フォーマット、セミコロンの欠落など）
-   **refactor**: バグ修正でも機能追加でもないコード変更
-   **perf**: パフォーマンスを向上させるコード変更
-   **test**: テストの追加や既存テストの修正
-   **chore**: ビルドプロセスやツール、ライブラリの変更
-   **ci**: CI 設定ファイルやスクリプトの変更
-   **build**: ビルドシステムや外部依存関係に影響する変更

## ✅ 正しい例

```
feat: ユーザー認証機能を追加
fix: ログイン時のバリデーションエラーを修正
docs: READMEにセットアップ手順を追加
style: コードフォーマットを統一
refactor: ユーザーサービスクラスを整理
test: ユーザー登録のテストケースを追加
chore: Dockerfileを更新
```

## ❌ 間違った例

```
✗ Update user authentication
✗ Fixed bug
✗ Added new feature
✗ WIP: working on login
✗ 🎉 新機能追加
```

## 📝 コミットメッセージ作成時の注意点

1. **タイプは必須**: 必ず適切なタイプを選択してください
2. **説明は簡潔に**: 50 文字以内で要点を伝える
3. **日本語 OK**: 説明部分は日本語で構いません
4. **現在形で記述**: 「追加した」ではなく「追加」
5. **大文字小文字**: タイプは小文字、説明の最初は大文字不要

## 🚨 Kiro への指示

**重要**: コード変更やファイル作成を行う際は、必ず Conventional Commits 形式でコミットメッセージを提案してください。

-   ユーザーがコミットメッセージを求めた場合
-   ファイルの変更内容に基づいて適切なタイプを選択
-   変更内容を簡潔に日本語で説明
-   複数の変更がある場合は、最も重要な変更に基づいてタイプを決定

例:

```
feat: Docker環境でのLaravel開発環境を構築
fix: WSL2でのlocalhost接続問題を解決
docs: Docker環境のセットアップ手順を追加
chore: PHP-FPMの設定を最適化
```
