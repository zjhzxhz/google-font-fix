=== Plugin Name ===
Contributors: zjhzxhz
Donate link: https://haozhexie.com/
Tags: China, gravatar, google, fonts, ajax, fix
Requires at least: 3.0.1
Tested up to: 4.7
Stable tag: 2.1.3
License: GPLv2
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Fix Google (//*.googleapis.com/*) and Gravatar service(//gravatar.com) for users in China.

== Description ==

**NOTE:** For non-Chinese users, they will still use the libraries derived from Google.

As we all know, the WordPress site become slower and slower because of the GFW in China.

The users always waiting for loading fonts from [fonts.googleapis.com](http://fonts.googleapis.com) and avatars from [Gravatar](https://gravatar.com), until time out.

To solve this problem, we create this plugin and replace google libraries (`//*.googleapis.com`) with the service provided by QiHoo, USTC, and CSS.NET for Chinese users. For gravatar service, we replace the original link with `//cn.gravatar.com/avatar`. All of the links mentioned above can be replaced in settings page.

After enable this plugin, the user experience become much better for WordPress users in China.

== Installation ==

1. Upload `google-font-fix` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enjoy!

== Frequently Asked Questions ==

= Who need this plugin? =
  
It's mainly designed for Chinese WordPress users. Because these people cannot access the API proviced by Google.
But I think every WordPress site can use this plugin if you have visitors from China.

== Screenshots ==

1. Options Page

== Changelog ==

= 2.1.3 = 

Resolve conflicts with other plugins.

= 2.1.2 = 

Update `Test up to` value to 4.7.

= 2.1.1 = 

Create icons for this plugin.

= 2.1.0 = 

Complete localization for Simplified Chinese.

= 2.0.0 = 

Create settings page for users to select mirrors of Google and Gravatar.

= 1.4.0.2 =

Update the introduction

= 1.4.0.1 =

Update the introduction

= 1.4 =

Add HTTPS support

= 1.3.2 =

Fix some bugs.

= 1.3.1 =

Fix some bugs.

= 1.3 =

Add accelerator for Gravatar service.

= 1.2.4 =

Fix some bugs.
Thanks to @Blueve.

= 1.2.3 =

Rename the geoip.inc file.

= 1.2.2 =

Fix some bugs.

= 1.2.1 =
Fix a bug that the 360's CDN cannot support https protocol.

= 1.2 =

Enable IP detect, only replace the service provided by 360 for Chinese visitors.
Thanks to @skyleft.

= 1.1 =

Fix a bug that flush with empty content.
Remove extra trunk/ folder in the plugin.

= 1.0 =

Complete the basic functions.

== Upgrade Notice ===
