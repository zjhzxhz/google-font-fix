Google Font Fix
===============

## Introduction

A wordPress plugin to speed up Google libraries and Gravatar service in WordPress for **Chinese vistors**. For non-Chinese vistors, they will still use services provided by Google and Gravatar.

You can also get the plugin from [WordPress Plugin Directory](https://wordpress.org/plugins/google-font-fix/).

## Description

As we all know, the loading time become longer and longer for Chinese vistors because of the GFW in China.

The vistors are always waiting for loading fonts from [fonts.googleapis.com](http://fonts.googleapis.com) and avatars from [Gravatar](https://gravatar.com), until timeout.

o resolve this problem, we developed this plugin and replaced google libraries (`//*.googleapis.com`) with the service provided by USTC and Cat Networks for Chinese users. For gravatar service, we replaced the links with `//cn.gravatar.com/avatar` or other alternative mirrors. You can change these proxy URLs in settings page.

After enabling this plugin, user experience becomes much better for WordPress vistors in China.

## Installation

1. Upload `google-font-fix` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enjoy!

## Screenshot

![Options Page](https://raw.githubusercontent.com/hzxie/google-font-fix/master/screenshot.png)
