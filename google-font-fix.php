<?php
/**
 * Plugin Name: Google Font Fix
 * Plugin URI: https://github.com/zjhzxhz/google-font-fix
 * Description: Use USTC's open fonts service to replace Google's for Chinese users.
 * Author: Haozhe Xie
 * Author URI: http://zjhzxhz.com
 * Version: 2.0
 * License: GPL v2.0
 */

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
require_once(PLUGIN_PATH . 'geo/geoip.inc.php');
require_once(PLUGIN_PATH . 'google-font-fix-options.php');

function google_apis_fix($buffer) {
    $geoData     = geoip_open(PLUGIN_PATH . 'geo/GeoIP.dat', GEOIP_STANDARD);
    $countryCode = geoip_country_code_by_addr($geoData, $_SERVER['REMOTE_ADDR']);
    geoip_close($geoData);
    
    /*if ( $countryCode != 'CN' ) {
        return $buffer;
    }*/
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