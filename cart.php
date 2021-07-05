<?php

$next_step_cart_link = '';

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $next_step_cart_link = "/cart/delivery-and-payment";
} else {
    $next_step_cart_link = "/cart/selection";
}

if (isset($_POST['movieDate']) && isset($_POST['movieHour'])){
    $movieDate = $_POST['movieDate'];
    $movieHour = $_POST['movieHour'];
    $movieTitle = $_POST['movieTitle'];

    $product = array(
        'title' => $movieTitle,
        'date' => $movieDate,
        'time' => $movieHour,
    );
    array_push($_SESSION['cart'], $product);
}

echo $twig->render('cart.html.twig', ['cart_php'=> $_SESSION['cart'], 'next_step_cart_link'=>$next_step_cart_link]);