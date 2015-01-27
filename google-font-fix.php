<?php
/**
 * Plugin Name: Google Font Fix
 * Plugin URI: https://github.com/zjhzxhz/google-font-fix
 * Description: Use 360 Open Fonts Service to replace Google's.
 * Author: 谢浩哲
 * Author URI: http://www.zjhzxhz.com
 * Version: 1.1
 * License: GPL v2.0
 */

include("geo/geoip.inc");

function google_apis_fix($buffer) {
    $geoData = geoip_open('geo/GeoIP.dat', GEOIP_STANDARD);
    $countryCode = geoip_country_code_by_addr($geoData, $_SERVER['REMOTE_ADDR']);
    geoip_close($geoData);
    if("CN"===$countryCode)
	    return str_replace('googleapis.com', 'useso.com', $buffer);
    else
        return $buffer;
}

function gpf_buffer_start() {
	ob_start("google_apis_fix");
}

function gpf_buffer_end() {
	while (ob_get_level() > 0) {
		ob_end_flush();
	}
}

add_action('init', 'gpf_buffer_start');
add_action('shutdown', 'gpf_buffer_end');

?>