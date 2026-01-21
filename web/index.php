<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define('YII_DEBUG', true);
define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';

// Подключаем .env
// $dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
// $dotenv->load();
// $dotenv = Dotenv\Dotenv::createMutable(__DIR__ . '/../');
// $dotenv->load();
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';

$config = require __DIR__ . '/../config/web.php';

(new yii\web\Application($config))->run();
