<?php

define('SITE_ROOT', __DIR__ . '/../');
define('ENGINE_DIR', SITE_ROOT . 'engine/');
define('WWW_DIR', SITE_ROOT . 'public/');
define('TPL_DIR', SITE_ROOT . 'templates/');
define('VENDOR_DIR', SITE_ROOT . 'vendor/');

require_once ENGINE_DIR . 'menu.php';
require_once VENDOR_DIR . 'autoload.php';
require_once ENGINE_DIR . '/Traits/SingletonTrait.php';
require_once ENGINE_DIR . '/Classes/Templater.php';
require_once ENGINE_DIR . '/Classes/DB.php';