<?php
/**
 * Plugin Name: Google Font Fix
 * Plugin URI: https://github.com/hzxie/Google-Font-Fix
 * Description: Replace Google and Gravatar resources for Chinese users.
 * Author: Haozhe Xie
 * Author URI: https://haozhexie.com
 * Version: 2.1.3
 * License: GPL v2.0
 */

define('GFF_PLUGIN_PATH', plugin_dir_path(__FILE__));
require_once(GFF_PLUGIN_PATH . 'geo/geoip.inc.php');
require_once(GFF_PLUGIN_PATH . 'google-font-fix-options.php');

function google_apis_fix($buffer) {
    $geoData     = geoip_open(GFF_PLUGIN_PATH . 'geo/GeoIP.dat', GEOIP_STANDARD);
    $countryCode = geoip_country_code_by_addr($geoData, $_SERVER['REMOTE_ADDR']);
    geoip_close($geoData);
    
    if ( $countryCode != 'CN' ) {
        return $buffer;
    }
    return preg_replace_callback(
            '|(https*:)*//(.*).googleapis.com/|', function($matches) {
                global $gff_options;
                return sprintf('//%s.%s/', $matches[2], $gff_options['google_service']);
            }, preg_replace_callback(
            '|http://[0-9]+.gravatar.com/avatar|', function($matches) {
                global $gff_options;
                return $gff_options['gravatar_service'];
            }, $buffer));
}

function gff_buffer_start() {
    ob_start("google_apis_fix");
}

function gff_buffer_end() {
    while ( ob_get_level() > 0 ) {
        ob_end_flush();
    }
}
add_action('init', 'gff_buffer_start');
add_action('shutdown', 'gff_buffer_end');
