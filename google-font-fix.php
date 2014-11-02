<?php
/**
 * Plugin Name: Google Font Fix
 * Plugin URI: https://github.com/zjhzxhz/google-font-fix
 * Description: Use 360 Open Fonts Service to replace Google's.
 * Author: 谢浩哲
 * Author URI: http://www.zjhzxhz.com
 * Version: 1.0
 * License: GPL v2.0
 */

function google_apis_fix($buffer) {
	return str_replace('googleapis.com', 'useso.com', $buffer);
}

function string_buffer_start() {
	ob_start("google_apis_fix");
}

function string_buffer_end() {
	ob_end_flush();
}

add_action('init', 'string_buffer_start');
add_action('shutdown', 'string_buffer_end');

?>