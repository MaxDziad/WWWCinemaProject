<?php
require __DIR__ . '/vendor/autoload.php';

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);
$places = 5;

$rows = 3;

echo $twig->render('hall_places.html.twig',['rows'=>$rows, 'places'=>$places]);


