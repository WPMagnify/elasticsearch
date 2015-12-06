<?php
/*
 * Plugin Name: WP Magnify Elasticsearch
 * Plugin URI: http://wpmagnify.org
 * Description: Use elasticsearch as a backend for post storage
 * Version: 1.0
 * Text Domain: wp-magnify-elasticsearch
 * Author: Christopher Davis
 * Author URI: http://christopherdavis.me
 * License: MIT
 *
 * This file is part of the wp-magnify/magnify-elasticsearch package.
 *
 * (c) Christopher Davis <http://christopherdavis.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

!defined('ABSPATH') && exit;

define('MAGNIFY_ES_TD', 'wp-magnify-elasticsearch');
define('MAGNIFY_ES_FILE', __FILE__);
define('MAGNIFY_ES_VER', '1.0.0');

if (file_exists(__DIR__.'/vendor/autoload.php')) { // local dev or installed via wp.org
    require __DIR__.'/vendor/autoload.php';
} elseif (!function_exists('magnify_core_load')) { // plugin installed with composer
    return; // TODO show an error here
}

add_action('magnify_loaded', 'magnify_elasticsearch_load');
