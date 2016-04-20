<?php
/**
 * Plugin name: Custom Post Status for WordPress
 * Plugin URI: https://github.com/octopus-digital-strategy/Custom-Posts-Status
 * Description: Register Custom Post Status. 
 * Version: 1.1.0
 * Author: Page-Carbajal
 * Author URI: http://pagecarbajal.com
 */

// No direct access to this file
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Composer implementation
require_once('vendor/autoload.php');

// Instance the Setup
new \CustomPostStatus\Setup();