<?php

require_once __DIR__.'/../vendor/autoload.php';

// ROOT_REALDIR の指定
define('ROOT_REALDIR', realpath(__DIR__ . '/../') . '/');

/** HTMLディレクトリからのDATAディレクトリの相対パス */
define('HTML2DATA_DIR', '../vendor/ec-cube2/ec-cube2/data/');

// DATA_REALDIR
define('DATA_REALDIR', HTML_REALDIR . HTML2DATA_DIR);

// CONFIG_REALFILE 指定
define('CONFIG_REALFILE', ROOT_REALDIR . 'config/config.php');

// CLASS_EX_REALDIR 指定
define('CLASS_EX_REALDIR', ROOT_REALDIR . "src/class_extends/");

// CACHE_REALDIR 指定
define('CACHE_REALDIR', ROOT_REALDIR . "var/cache/master/");

// TEMP_REALDIR 指定 (*)
define('TEMP_REALDIR', ROOT_REALDIR . "var/temp/");

// LOG_REALDIR 指定 (*)
define('LOG_REALDIR', ROOT_REALDIR . "var/log/");

// BACKUP_REALDIR 指定 (*)
define('BACKUP_REALDIR', ROOT_REALDIR . "var/backup/");

// MDB2_PORTABILITY_FIX_CASE
define('MDB2_PORTABILITY_FIX_CASE', 0);


// Zip
/** 郵便番号CSV ファイルのパス */
define('ZIP_CSV_REALFILE', ROOT_REALDIR . 'var/zip/KEN_ALL.CSV');

/** UTF-8 変換済みの郵便番号CSV ファイルのパス */
define('ZIP_CSV_UTF8_REALFILE', ROOT_REALDIR . 'var/zip/KEN_ALL_utf-8.CSV');

// ZIP_TEMP_REALDIR 指定 (*)
define('ZIP_TEMP_REALDIR', TEMP_REALDIR . 'zip/');


/** data/module 以下の PEAR ライブラリを優先的に使用する */
set_include_path(realpath(__DIR__ . '/' . HTML2DATA_DIR . 'module') . PATH_SEPARATOR . get_include_path());

/**
 * DIR_INDEX_FILE にアクセスするときにファイル名を使用するか
 *
 * true: 使用する, false: 使用しない, null: 自動(IIS は true、それ以外は false)
 * ※ IIS は、POST 時にファイル名を使用しないと不具合が発生する。(http://support.microsoft.com/kb/247536/ja)
 */
define('USE_FILENAME_DIR_INDEX', null);

// bufferを初期化する
while (ob_get_level() > 0 && ob_get_level() > 0) {
    ob_end_clean();
}
