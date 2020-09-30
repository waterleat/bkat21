# ![Bka2021](http://www.alecaddd.com/wp-content/uploads/2017/05/Bka2018-logo.png)
> A Modern WordPress Starter Theme for savvy Developers

[![Build Status](https://travis-ci.org/Alecaddd/Bka2018.svg?branch=master)](https://travis-ci.org/Alecaddd/Bka2018) ![Dependecies](https://david-dm.org/Alecaddd/Bka2018.svg) ![NPM latest](https://img.shields.io/npm/v/npm.svg) ![GPL License](https://img.shields.io/badge/license-GPLv3-blue.svg) [![Code Climate](https://codeclimate.com/github/Alecaddd/Bka2018/badges/gpa.svg)](https://codeclimate.com/github/Alecaddd/Bka2018)

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

AWPS uses [Laravel Mix](https://laravel.com/docs/5.6/mix) for assets management. Check the official documentation for advanced options

* Edit the `webpack.mix.js` in the root directory of your theme to set your localhost URL and customize your assets
* `npm run watch` to start browserSync with LiveReload and proxy to your custom URL
* `npm run dev` to quickly compile and bundle all the assets without watching
* `npm run prod` to compile the assets for production


## Features

* Bult-in `webpack.mix.js` for fast development and compiling.
* `OOP` PHP, and `namespaces` with `PSR4` autoload.
* `Customizer` ready with boilerplate and example classes.
* `Gutenberg` ready with boilerplate and example blocks.
* `ES6 Javascript` syntax ready.
* Compatible with `JetPack`, `WooCommerce`, `ACF PRO`, and all the most famous plugins.
* Built-in `FlexBox` Responsive Grid.
* Modular, Components based file structure.


## License

[GPLv3](https://github.com/Alecaddd/Bka2018/blob/master/LICENSE.txt)

## BKA specific information

* uses tailwindcss for styling
* 2 version of frontpage a mobile friendly version and an xl version for very wide screens
* the events we use need the BKA2019ds plugin to be listed by Bu and type of events
* 2 menus for each of kendo, iaido & jodo. eg kendo1 for all visitors and kendo2 for loggedin users. A 3rd menu buAdmin is for bu officers so they can administer events and gradings, which needs themodule within the BKA2019ds plugin activated.
* cs has 5 menus: non-loggedin users for new member registration. all users. Loggedin user. buadmin user and also  membershipadmin user, both which need their modules activated within the BKA2019ds plugin.
* .env file has membership database data as well as WordPress Database
* Theme has 2 custom post types one for officers and the other for reviews of events. Officer one currently requires additional blocks for Gutenberg editor; this still needs work.
* WordPress pages use parent pages for bu files and also for membership ones. Membership pages use templates to produce the content and limit access.
