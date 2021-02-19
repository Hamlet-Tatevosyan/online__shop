<?php
// Regular expressions
// preg_match, preg_replace
//  $someString = 'Hello World. 2000 2002';
//  $pattern = '/200[0-5]/';
//
//  $result = preg_match($pattern, $someString);
//
//  var_dump($result);

// Front Controller


//  All Settings
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

// Includes all system files
define('ROOT', dirname(__FILE__));
require_once (ROOT . '/components/Autoload.php');

// Connect to DB
require_once (ROOT . '/components/Db.php');

// Call to Router
$router = new Router();
$router->run();