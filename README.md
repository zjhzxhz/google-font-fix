Google Font Fix
===============

## Introduction

A wordPress plugin to fix Google libraries and Gravatar service in WordPress for **Chinese users**. For non-Chinese users, they will still use the libraries derived from Google.

You also can get the plugin from [WordPress Plugin Directory](https://wordpress.org/plugins/google-font-fix/).

## Description

As we all know, the WordPress site become slower and slower because of the GFW in China.

The users always waiting for loading fonts from [fonts.googleapis.com](http://fonts.googleapis.com) and avatars from [Gravatar](https://gravatar.com), until time out.

To solve this problem, we create this plugin and replace google libraries (`//*.googleapis.com`) with the service provided by University of Science and Technology of China (USTC) (`//*.lug.ustc.edu.cn`) for Chinese users. For gravatar service, we replace the original link with `//cn.gravatar.com/avatar`.

After enable this plugin, the user experience become much better for WordPress users in China.

## Installation

1. Upload `google-font-fix` folder to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Enjoy!