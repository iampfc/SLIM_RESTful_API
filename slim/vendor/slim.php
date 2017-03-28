<?php
/**
 * Created by PhpStorm.
 * User: wing
 * Date: 17/3/19
 * Time: 上午12:57
 */

/**
 * Step 1: Require the Slim Framework using Composer's autoloader
 *
 * If you are not using Composer, you need to load Slim Framework with your own
 * PSR-4 autoloader.
 */
require 'autoload.php';

/**
 * Step 2: Instantiate a Slim application
 *
 * This example instantiates a Slim application using
 * its default settings. However, you will usually configure
 * your Slim application now by passing an associative array
 * of setting names and values into the application constructor.
 */
//$app = new Slim\App();

/**
 * Step 3: Define the Slim application routes
 *
 * Here we define several Slim application routes that respond
 * to appropriate HTTP request methods. In this example, the second
 * argument for `Slim::get`, `Slim::post`, `Slim::put`, `Slim::patch`, and `Slim::delete`
 * is an anonymous function.
 */

/**
 * 引入NotORM
 */
require '../notorm/NotORM.php';
//$pdo = new PDO('mysql:host=localhost;dbname=app', "root", "wing-root");
//$pdo->exec("SET NAMES 'utf8'");
//$db = new NotORM($pdo);
