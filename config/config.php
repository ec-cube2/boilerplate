<?php

Env::init();

if (file_exists(ROOT_REALDIR.'.env')) {
    $dotenv = new Dotenv\Dotenv(ROOT_REALDIR);
    $dotenv->load();
    $dotenv->required(array(
        'HTTP_URL',
        'HTTPS_URL',
        'ROOT_URLPATH',
        'DB_TYPE',
        'DB_USER',
        'DB_NAME',
        'ADMIN_DIR',
        'AUTH_MAGIC',
        'PASSWORD_HASH_ALGOS',
        'MAIL_BACKEND',
    ));
}

define('ECCUBE_INSTALL', 'ON');
define('HTTP_URL', env('HTTP_URL'));
define('HTTPS_URL', env('HTTPS_URL'));
define('ROOT_URLPATH', env('ROOT_URLPATH'));
define('DOMAIN_NAME', env('DOMAIN_NAME'));
define('DB_TYPE', env('DB_TYPE'));
define('DB_USER', env('DB_USER'));
define('DB_PASSWORD', env('DB_PASSWORD'));
define('DB_SERVER', env('DB_SERVER') ? env('DB_SERVER') : 'localhost');
define('DB_NAME', env('DB_NAME'));
define('DB_PORT', env('DB_PORT'));
define('ADMIN_DIR', env('ADMIN_DIR'));
define('ADMIN_FORCE_SSL', env('ADMIN_FORCE_SSL'));
define('ADMIN_ALLOW_HOSTS', env('ADMIN_ALLOW_HOSTS'));
define('AUTH_MAGIC', env('AUTH_MAGIC'));
define('PASSWORD_HASH_ALGOS', env('PASSWORD_HASH_ALGOS'));
define('MAIL_BACKEND', env('MAIL_BACKEND'));
define('SMTP_HOST', env('SMTP_HOST'));
define('SMTP_PORT', env('SMTP_PORT'));
define('SMTP_USER', env('SMTP_USER'));
define('SMTP_PASSWORD', env('SMTP_PASSWORD'));
