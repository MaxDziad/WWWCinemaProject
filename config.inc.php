<?php

// Twig
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

$loader = new FilesystemLoader(__DIR__ . '/templates');
$twig = new Environment($loader);

// Database
$config = [
    'db_host'     => 'localhost',
    'db_name'     => 's123',
    'db_user'     => 's123',
    'db_password' => 'pyf8achs'
];

// Recaptcha
$config['recaptcha_public'] = '6LcrreYUAAAAAGeERM9Etdv8wlh81RCSK0LXuwfX';
$config['recaptcha_private'] = '6LcrreYUAAAAALTdoToeer_H4NZ1ECK4U76g0huL';
