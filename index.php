<?php
// Valid PHP Version?
$minPHPVersion = '7.2';
if (phpversion() < $minPHPVersion)
{
	die("Your PHP version must be {$minPHPVersion} or higher to run CodeIgniter. Current version: " . phpversion());
}
unset($minPHPVersion);

// Path to the front controller (this file)
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('THEME','http://localhost/Astro//public/');
define('CTRL','http://localhost/Astro/');
define('SiteURL','https://astrolekha.com/blog/');
define('SiteBase','https://astrolekha.com/');
define('ImagePath','/public/uploads/media/');
define('ImageBase','https://astrolekha.com/public/uploads/media/');

// Location of the Paths config file.
// This is the line that might need to be changed, depending on your folder structure.
$pathsPath = realpath(FCPATH . 'app/Config/Paths.php');
// ^^^ Change this if you move your application folder

/*
 *---------------------------------------------------------------
 * BOOTSTRAP THE APPLICATION
 *---------------------------------------------------------------
 * This process sets up the path constants, loads and registers
 * our autoloader, along with Composer's, loads our constants
 * and fires up an environment-specific bootstrapping.
 */

// Ensure the current directory is pointing to the front controller's directory
chdir(__DIR__);

// Load our paths config file
require $pathsPath;
$paths = new Config\Paths();

// Location of the framework bootstrap file.
$app = require rtrim($paths->systemDirectory, '/ ') . '/bootstrap.php';

/*
 *---------------------------------------------------------------
 * LAUNCH THE APPLICATION
 *---------------------------------------------------------------
 * Now that everything is setup, it's time to actually fire
 * up the engines and make this app do its thang.
 */
$app->run();
