# Daisy - Dashboard



## CakePHP Application Skeleton

[![Build Status](https://api.travis-ci.org/cakephp/app.png)](https://travis-ci.org/cakephp/app)
[![License](https://poser.pugx.org/cakephp/app/license.svg)](https://packagist.org/packages/cakephp/app)

A skeleton for creating applications with [CakePHP](http://cakephp.org) 3.0.

### Easy installation

1. Clone
2. Init Database (daisy_db.sql)
3. Change config/datasource.php configurations to pass your Database
4. Trigger composer_update.sh via terminal
5. Set up your WebServer for this project
  * PHP: php.ini > post_max_size = 0
  * NGINX: server { ...; client_max_body_size 200M; }
  * MySQL: my.ini > max_allowed_packet = 99194304
6. READY

### Installation (or use composer_update.sh)

1. Download [Composer](http://getcomposer.org/doc/00-intro.md) or update `composer self-update`.
2. Run `php composer.phar create-project --prefer-dist cakephp/app [app_name]`.

If Composer is installed globally, run
```bash
composer create-project --prefer-dist cakephp/app [app_name]
```

You should now be able to visit the path to where you installed the app and see
the setup traffic lights.

### Configuration

Read and edit `config/app.php` and setup the 'Datasources' and any other
configuration relevant for your application.
