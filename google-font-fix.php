<?php
/*
	Plugin Name: Google Font Fix
	Plugin URI: http://www.zjhzxhz.com
	Description: 将谷歌字体等链接替换成360国内CDN链接, 解决Google在中国访问问题.
	Version: 1.0
	Author: 谢浩哲
	Author URI: http://www.zjhzxhz.com
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