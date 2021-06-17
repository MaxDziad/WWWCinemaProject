<?php

use Twig\Environment;
use Twig\Loader\ArrayLoader;

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

// Loading Twig API
require_once 'vendor/autoload.php';
$title = "TEST TWIGA HEHE";
$loader = new ArrayLoader([]);
$twig = new Environment($loader);

//if (isset($config) && is_array($config)) {
//
//    try {
//        $dbh = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8mb4', $config['db_user'], $config['db_password']);
//        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    } catch (PDOException $e) {
//        print "Nie mozna polaczyc sie z baza danych: " . $e->getMessage();
//        exit();
//    }
//
//} else {
//    exit("Nie znaleziono konfiguracji bazy danych.");
//}
include ("templates\index.html.twig");


