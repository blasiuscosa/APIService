<?php

//namespace Manobo\Config;

//URL
define('URL_MANOBO_CENTRAL', 'manobo.de');
define('SERVERTYPE_LOCAL_DEVELOPMENT', 'SERVERLOCALDEV');
define('SERVERTYPE_STAGING', 'SERVERSTAGING');
define('SERVERTYPE_LIVE', 'SERVERLIVE');
define('DEVELOPER_NAME_COSA', 'cosa');
define('DEVELOPER_NAME_DEWA', 'dewa');
define('DEVELOPER_NAME_ERICK', 'erick');
define('DEVELOPER_NAME_SAHAT', 'sahat');
$server = $_SERVER['SERVER_NAME'];
switch ($server) {
    //DEVELOPMENT CONFIGURATION (COSA)
    case DEVELOPER_NAME_COSA . '.api.' . URL_MANOBO_CENTRAL . '.dev':
        $servertype = SERVERTYPE_LOCAL_DEVELOPMENT;
        $developer_name = DEVELOPER_NAME_COSA;
        define('DB_SERVER', '127.0.0.1');
        define('DB_SERVER_USERNAME', 'root');
        define('DB_SERVER_PASSWORD', '123456');
        define('DB_DATABASE', 'dbapi');
        break;
    //DEVELOPMENT CONFIGURATION (DEWA)
    case DEVELOPER_NAME_DEWA . '.api.' . URL_MANOBO_CENTRAL . '.dev':
        $servertype = SERVERTYPE_LOCAL_DEVELOPMENT;
        $developer_name = DEVELOPER_NAME_DEWA;
        define('DB_SERVER', '127.0.0.1');
        define('DB_SERVER_USERNAME', 'manobo');
        define('DB_SERVER_PASSWORD', 'm4n0b0-dewa');
        define('DB_DATABASE', 'manoboapi');
        break;
    //DEVELOPMENT CONFIGURATION (SAHAT)
    case DEVELOPER_NAME_SAHAT . '.api.' . URL_MANOBO_CENTRAL . '.dev':
        $servertype = SERVERTYPE_LOCAL_DEVELOPMENT;
        $developer_name = DEVELOPER_NAME_SAHAT;
        define('DB_SERVER', 'localhost');
        define('DB_SERVER_USERNAME', 'manobo');
        define('DB_SERVER_PASSWORD', 'm4n0b0-sahat');
        define('DB_DATABASE', 'manoboapi');
        break;
        break;
    //DEVELOPMENT CONFIGURATION (ERICK)
    case DEVELOPER_NAME_ERICK . '.api.' . URL_MANOBO_CENTRAL . '.dev':
        $servertype = SERVERTYPE_LOCAL_DEVELOPMENT;
        $developer_name = DEVELOPER_NAME_ERICK;
        define('DB_SERVER', 'localhost');
        define('DB_SERVER_USERNAME', 'root');
        define('DB_SERVER_PASSWORD', 'root');
        define('DB_DATABASE', 'manoboapi');
        break;
    //STAGING CONFIGURATION (CENTRAL)
    case 'staging.api.' . URL_MANOBO_CENTRAL:
        $servertype = SERVERTYPE_STAGING;
        define('DB_SERVER', 'mysql5.manobo.net');
        define('DB_SERVER_USERNAME', 'db168841_40');
        define('DB_SERVER_PASSWORD', 'h$KrmN55ZQeg');
        define('DB_DATABASE', 'db168841_40');
        break;
    //LIVE CONFIGURATION (CENTRAL)
    case 'service.api.' . URL_MANOBO_CENTRAL:
        $servertype = SERVERTYPE_LIVE;
        $server_local_code = SERVER_CENTRAL_CODE;
        define('DB_SERVER', 'mysql5.manobo.net');
        define('DB_SERVER_USERNAME', 'db168841_39');
        define('DB_SERVER_PASSWORD', 'vU9nuyRqafv&');
        define('DB_DATABASE', 'db168841_39');
        define('FS_PATH', '/kunden/168841_22087/');
        break;
}

define('SERVERTYPE', $servertype);