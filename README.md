# ![Bka2021](http://www.alecaddd.com/wp-content/uploads/2017/05/Bka2018-logo.png)
> A Modern WordPress Starter Theme for savvy Developers

[![Build Status](https://travis-ci.org/waterleat/bkat21.svg?branch=master)](https://travis-ci.org/waterleat/bkat21) ![Dependecies](https://david-dm.org/waterleat/bkat21.svg) ![NPM latest](https://img.shields.io/npm/v/npm.svg) ![GPL License](https://img.shields.io/badge/license-GPLv3-blue.svg) [![Code Climate](https://codeclimate.com/github/waterleat/bkat21/badges/gpa.svg)](https://codeclimate.com/github/waterleat/bkat21)

## Prerequisites

This theme relies on **NPM** and **Composer** in order to load dependencies and packages.
**Webpack** should always be running and watching during the development process, in order to properly compile and update files.

* Install [Composer](https://getcomposer.org/)
* Install [Node](https://nodejs.org/)


## Installation

* Move the `.env.example` to your WordPress root directory, rename it as `.env`, and setup your website variables
* Move the `wp-config.sample.php` to your WordPress root directory and rename it as `wp-config.php`, to replace the default one
* Open a Terminal window on the location of the theme folder
* Execute `composer install`
* Execute `npm install`


## Webpack

The theme uses [Laravel Mix](https://laravel.com/docs/5.6/mix) for assets management. Check the official documentation for advanced options

* Edit the `webpack.mix.js` in the root directory of your theme to set your localhost URL and customize your assets
* `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
* `npm run dev` to quickly compile and bundle all the assets without watching
* `npm run prod` to compile the assets for production


## Features

* Bult-in `webpack.mix.js` for fast development and compiling.
* `OOP` PHP, and `namespaces` with `PSR4` autoload.
* `Customizer` ready with boilerplate and example classes.
* `Gutenberg` ready with boilerplate and example blocks. (Need to be added to fit the latest version of the editor)
* `ES6 Javascript` syntax ready.
* Compatible with `JetPack`, `WooCommerce`, `ACF PRO`, and all the most famous plugins.
* Built-in `FlexBox` Responsive Grid.
* Modular, Components based file structure.


## License

[GPLv3](https://github.com/waterleat/bkat21/blob/master/LICENSE.txt)

## BKA specific information

* uses tailwindcss for styling
* .env file has membership database data as well as WordPress Database
* the events we use need the EventOrganiser plugin. The template files for displaying event listings have been copied here and modified to fit this theme.
