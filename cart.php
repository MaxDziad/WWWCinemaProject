<?php

$next_step_cart_link = '';

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $next_step_cart_link = "/cart/delivery-and-payment";
} else {
    $next_step_cart_link = "/cart/selection";
}

echo $twig->render('cart.html.twig', ['cart_php'=> $_SESSION['cart'], 'next_step_cart_link'=>$next_step_cart_link]);