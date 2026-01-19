<?php
/**
 * Plugin Name: PHPNomad
 * Plugin URI: https://github.com/phpnomad/wordpress
 * Description: A comprehensive bundle of PHPNomad packages providing modular PHP components for WordPress including core utilities, database abstraction, REST API, templating, events, and more.
 * Version: 1.0.0
 * Author: PHPNomad
 * Author URI: https://github.com/phpnomad
 * License URI: http://www.gnu.org/licenses/gpl-3.0.txt
 * License: GPLv3 or later
 * Text Domain: phpnomad
 * Requires PHP: 8.2
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Load Composer autoloader
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
    do_action('phpnomad_ready');
}
