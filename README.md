Google Font Fix
===============

## Introduction

A wordPress plugin to accelerate the loading speed of Google libraries and Gravatar service in WordPress for **Chinese vistors**. For the vistors from outside China mainland, they will still use links to the original site instead of the mirror site.

You can also get the plugin from [WordPress Plugin Directory](https://wordpress.org/plugins/google-font-fix/).

## Description

**NOTE:** For the vistors from outside Mainland China, they will still use links to the original site instead of the mirror site.

As we all know, the loading time becomes longer for Chinese vistors because of the GFW in China.
The vistors are always waiting for loading fonts from [fonts.googleapis.com](http://fonts.googleapis.com) and avatars from [Gravatar](https://gravatar.com) for a long time.

To solve this problem, we develop this plugin and replace the google libraries (`//*.googleapis.com`) with the service provided by USTC and Cat Networks for Chinese users. As for the gravatar service, the links are replaced with `//cn.gravatar.com/avatar` or other alternative mirrors. You can change these mirror site URLs in the settings page.

After enabling this plugin, the user experience becomes much better for the vistors from Mainland China.

## Installation

1. Upload `google-font-fix` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enjoy!

## Screenshot

![Options Page](https://raw.githubusercontent.com/hzxie/google-font-fix/master/screenshot.png)
