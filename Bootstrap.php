<?php
/**
 * Aldu\Bootstrap
 *
 * AlduPHP(tm) : The Aldu Network PHP Framework (http://aldu.net/php)
 * Copyright 2010-2012, Aldu Network (http://aldu.net)
 *
 * Licensed under Creative Commons Attribution-ShareAlike 3.0 Unported license (CC BY-SA 3.0)
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Giovanni Lovato <heruan@aldu.net>
 * @copyright     Copyright 2010-2012, Aldu Network (http://aldu.net)
 * @link          http://aldu.net/php AlduPHP(tm) Project
 * @package       Aldu
 * @uses          Aldu\Core\Net\HTTP
 * @uses          Aldu\Core\Utility\ClassLoader
 * @since         AlduPHP(tm) v1.0.0
 * @license       Creative Commons Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)
 */

namespace Aldu;
use Aldu\Core\Net\HTTP;
use Aldu\Core\Utility\ClassLoader;

/**
 * Define the framework's name
 */
define('ALDU_NAME', 'AlduPHP');

/**
 * Define the framework's version
 */
define('ALDU_VERSION', '0.9.0');

/**
 * Define a shortcut for DIRECTORY_SEPARATOR
 */
if (!defined('DS')) {
  define('DS', DIRECTORY_SEPARATOR);
}

/**
 * Define a shortcut for PATH_SEPARATOR
 */
if (!defined('PS')) {
  define('PS', PATH_SEPARATOR);
}

/**
 * Define the NAMESPACE_SEPARATOR
 */
if (!defined('NAMESPACE_SEPARATOR')) {
  define('NAMESPACE_SEPARATOR', "\\");
}

/**
 * Define a shortcut for NAMESPACE_SEPARATOR
 */
if (!defined('NS')) {
  define('NS', NAMESPACE_SEPARATOR);
}

/**
 * Define the event payload separator
 */
if (!defined('ALDU_EVENT_SEPARATOR')) {
  define('ALDU_EVENT_SEPARATOR', '.');
}

/**
 * Define the framework's base directory
 */
if (!defined('ALDU_BASE')) {
  define('ALDU_BASE', dirname(__DIR__));
}

/**
 * Define the current webroot directory
 */
if (!defined('ALDU_ROOT')) {
  define('ALDU_ROOT', getcwd());
}

/**
 * Define the default application's directory
 */
if (!defined('ALDU_APPLICATION')) {
  define('ALDU_APPLICATION', ALDU_ROOT . DS . "application");
}

/**
 * Define the configuration files' directory
 */
if (!defined('ALDU_CONFIG_DIR')) {
  define('ALDU_CONFIG_DIR', ALDU_ROOT . DS . "configuration");
}

/**
 * Define the private files' directory
 */
if (!defined('ALDU_PRIVATE')) {
  define('ALDU_PRIVATE', ALDU_ROOT . DS . "private");
}

/**
 * Define the default datasource file
 */
if (!defined('ALDU_DEFAULT_DATASOURCE')) {
  define('ALDU_DEFAULT_DATASOURCE', ALDU_PRIVATE . DS . "datasource.db");
}

/**
 * Define the public files' directory
 */
if (!defined('ALDU_PUBLIC')) {
  define('ALDU_PUBLIC', ALDU_ROOT . DS . "public");
}

/**
 * Define the themes' directory
 */
if (!defined('ALDU_THEMES')) {
  define('ALDU_THEMES', ALDU_PUBLIC . DS . "themes");
}

/**
 * Define the cache files' directory
 */
if (!defined('ALDU_CACHE')) {
  define('ALDU_CACHE', ALDU_PRIVATE . DS . "cache");
}

/**
 * Define the cache failure value
 */
if (!defined('ALDU_CACHE_FAILURE')) {
  define('ALDU_CACHE_FAILURE', "ALDU_CACHE_FAILURE");
}

/**
 * Define the default cache time-to-live
 */
if (!defined('ALDU_CACHE_TTL')) {
  define('ALDU_CACHE_TTL', 3600);
}

/**
 * Define the uploaded files' directory
 */
if (!defined('ALDU_UPLOAD')) {
  define('ALDU_UPLOAD', ALDU_PRIVATE . DS . "upload");
}

/**
 * Define the uplaoded files' prefix
 */
if (!defined('ALDU_UPLOAD_PREFIX')) {
  define('ALDU_UPLOAD_PREFIX', "UPL");
}

/**
 * Define the sandbox directory
 */
if (!defined('ALDU_SANDBOX')) {
  define('ALDU_SANDBOX', ALDU_PRIVATE . DS . "sandbox");
}

require 'Core' . DS . 'Utility' . DS . 'ClassLoader.php';

foreach (array(
  new ClassLoader(__NAMESPACE__, ALDU_BASE),
  new ClassLoader(null, ALDU_APPLICATION), new ClassLoader()
) as $cl) {
  $cl->register();
}

$request = HTTP\Request::fetch(PHP_SAPI);
$dispatcher = new Core\Dispatcher($request);
$dispatcher->dispatch();
