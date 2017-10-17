<?php
/**
 * Plugin Name: Google Font Fix
 * Plugin URI: https://github.com/hzxie/Google-Font-Fix
 * Description: Replace Google and Gravatar resources for Chinese users.
 * Author: Haozhe Xie
 * Author URI: https://haozhexie.com
 * Version: 2.2.2
 * License: GPL v2.0
 */

define('GFF_PLUGIN_PATH', plugin_dir_path(__FILE__));
require_once(GFF_PLUGIN_PATH . 'geo/geoip.inc.php');
require_once(GFF_PLUGIN_PATH . 'google-font-fix-options.php');

function google_apis_fix($buffer) {
    $country_code = gff_get_country_code($_SERVER['REMOTE_ADDR']);
    if ( $country_code != 'CN' ) {
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

function gff_get_country_code($remote_addr) {
    $is_ipv6        = strpos($remote_addr, ':');
    $geoip_function = sprintf('geoip_country_code_by_addr%s', $is_ipv6 ? '_v6' : '');
    $geo_file_name  = sprintf('GeoIP%s.dat', $is_ipv6 ? 'v6' : '');
    $geo_data       = geoip_open(GFF_PLUGIN_PATH. "geo/{$geo_file_name}", GEOIP_STANDARD);
    $country_code   = $geoip_function($geo_data, $remote_addr);
    geoip_close($geo_data);

    return $country_code;
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
