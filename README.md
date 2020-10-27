# EC-CUBE2 Boilerplate

EC-CUBE2 を Composer で管理

## 仕組み・メリット

EC-CUBE2 をComposer経由でインストールし、 vendor/ 以下にインストールします。  
そのため、EC-CUBE2自体をGitで管理することは不要で、アップデートが容易に可能となります。

同時に EC-CUBE2 CLI を導入するため、CLIで管理可能になります。

プラグイン・モジュール・テンプレートもCompserでインストールする方法は、 [ec-cube2/plugin-installer](https://github.com/ec-cube2/plugin-installer) を参考にしてください。


## Installation / Usage

手順は今後短縮していきます。
アイデアは [GitHub Issue](https://github.com/ec-cube2/boilerplate/issues) からお寄せください。

### 1. プロジェクトの作成は以下のコマンドで行います。

```sh
composer create-project ec-cube2/boilerplate PROJECT_NAME
```

PROJECT_NAME はあなたのプロジェクト名に変更してください。

`create-project` 実行時に、EC-CUBE2から必要なファイルがコピーされます。


Dockerで実行するには以下を実行してください。

```sh
mkdir PROJECT_NAME
cd PROJECT_NAME
docker run --rm -it --volume="$PWD:/var/www/app" eccube2/php:5.6-fpm composer create-project ec-cube2/boilerplate .
```




### 2. 設定

設定は .env を設定するか、本番・Dockerなどでは環境変数で指定しましょう。  
以下の項目を設定します。

| 設定値 | 必須 | デフォルト | Dockerデフォルト |
| --- | --- | --- | --- |
| HTTP_URL | * |  | http://localhost:8080/ |
| HTTPS_URL | * |  | http://localhost:8080/ |
| ROOT_URLPATH | * | / | / |
| DOMAIN_NAME |  |  |  |
| DB_TYPE | * |  | mysql |
| DB_USER | * |  | eccube2 |
| DB_PASSWORD |  |  | password |
| DB_SERVER | * |  | mysql |
| DB_NAME | * |  | eccube2 |
| DB_PORT |  |  |  |
| ADMIN_DIR | * | admin/ | admin/ |
| ADMIN_FORCE_SSL | * | false | false |
| ADMIN_ALLOW_HOSTS | * | a:0:{} | a:0:{} |
| AUTH_MAGIC | * |  |  |
| PASSWORD_HASH_ALGOS | * | sha256 | sha256 |
| MAIL_BACKEND | * | smtp | smtp |
| SMTP_HOST |  |  |  |
| SMTP_PORT |  |  |  |
| SMTP_USER |  |  |  |
| SMTP_PASSWORD |  |  |  |

.env.dist から .env は簡単に作成できます。  
Docker経由の場合は docker-compose.yml で設定してください。

新規インストールの際に使用する `AUTH_MAGIC` の値を以下のコマンドで生成することができます。

```
./vendor/bin/eccube util:random-string
```


### 3. インストール

EC-CUBE2のインストールは EC-CUBE2 CLI で行えます。  
以下のコマンドを順番に実行していきましょう。

別のCLIでbashを開き実行しましょう。

```
docker-compose exec app bash
```

インストールコマンド

```
./vendor/bin/eccube install
```

インストール後、Composerでのインストールの設定の修正などを行うため、以下のコマンドを実行してください。

```
./vendor/bin/eccube composer-fix
```

[ComposerFix](https://github.com/ec-cube2-plugin/composer_fix) プラグインにより以下の問題を修正します。

- 一部 EC-CUBE2 にハードコーディングされたディレクトリが存在するため、上記ディレクトリ構成が有効にならない場合があります。
    - バックアップ
    - 郵便番号アップーデート
- phpinfo が EC-CUBE2 管理画面から確認可能なため、上記設定が確認可能です。


### 4. 初期ユーザーの作成

管理画面ユーザーの作成もコマンドラインで行なえます。

```
./vendor/bin/eccube member:create
```

### 5. これで終了。

これで完了です。  
早速アクセスしてみましょう。

### 6. 追加

郵便番号の更新もCLIからやっておきましょう。  
進捗もグラフィカルです。

```
./vendor/bin/eccube zip:update
```


## Docker で実行

Docker で実行する場合には、 Docker Compose での実行が便利です。  
ローカル環境であれば、すぐに実行が可能です。

```
docker-compose up
```

停止は、Ctrl + C で行えます。

http://localhost:8080/ から EC-CUBE2にアクセスできます。


## ディレクトリ構成

ディレクトリ構成も今までのEC-CUBE2とは違います。  
より簡単に、運用しやすいディレクトリ構成で実行できます。

- config
- plugin : プラグイン
    - SamplePlugin
    - ...
- module : モジュール
    - mdl_sample
    - ...
- src
    - class_extends : クラス拡張
- templates : Smartyテンプレート
    - admin
    - default
    - sphone
    - mobile
    - ...
- tests : PHPUnit tests
- html : Webルート
- var
    - cache
        - smarty : テンプレートキャッシュ
        - master : マスタキャッシュ
    - download : ダウンロード販売ファイル
    - temp : 一時ファイル
        - plugin_install
        - plugin_update
        - download
        - csv
        - zip 
    - log : EC-CUBE ログ
    - zip : 郵便番号
- vendor
    - eccube2
        - eccube2 : EC-CUBE 本体
    - ...
