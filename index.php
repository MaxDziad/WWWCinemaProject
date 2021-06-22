<?php


use Twig\Environment;
use Twig\Loader\FilesystemLoader;


require __DIR__ . '/vendor/autoload.php';

ini_set('display_errors', 1);
error_reporting(E_ALL);

include("config.inc.php");

// Commented, cause with it cannot check how is site goin'
//if (isset($config) && is_array($config)) {
//
//    try {
//        $dbh = new PDO('mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'] . ';charset=utf8mb4',
//            $config['db_user'], $config['db_password']);
//        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    } catch (PDOException $e) {
//        print "Nie mozna polaczyc sie z baza danych: " . $e->getMessage();
//        exit();
//    }
//
//} else {
//    exit("Nie znaleziono konfiguracji bazy danych.");
//}

$today =  date("d.m.Y")  ;

// Render index.html
echo $twig->render('index.html.twig', ['date'=>$today]);


$allowed_pages = ['main', 'movies', 'movie_details', 'cart', 'login', 'registration', 'hall_places'];
$protected_pages = ['profile'];

if (isset($_GET['page']) && $_GET['page'] && in_array($_GET['page'], $allowed_pages)) {
    if (in_array($_GET['page'], $protected_pages) && !isset($_SESSION['id'])) {
        print '<p style="font-weight: bold; color: red;">Nie masz uprawnień do tej strony.</p>';
        return;
    }
    if (file_exists($_GET['page'] . '.php')) {
        include($_GET['page'] . '.php');
    } else {
        print 'Plik ' . $_GET['page'] . '.php nie istnieje.';
    }
} else {
    include('main.php');
}



