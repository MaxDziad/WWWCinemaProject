<?php

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $next_step_cart_link = "/cart/delivery-and-payment";
} else {
    $next_step_cart_link = "/cart/selection";
}

if (isset($_POST['movieDate']) && isset($_POST['movieHour'])){
    $movieTitle = $_POST['movieTitle'];
    $movieDate = $_POST['movieDate'];
    $movieHour = $_POST['movieHour'];

    $ticket = array(
        'title' => $movieTitle,
        'date' => $movieDate,
        'time' => $movieHour,
        'price' => 19.99
    );
    array_push($_SESSION['cart'], $ticket);
}

if (isset($_GET['remove']) && intval($_GET['remove']) >= 0) {
    $id = intval($_GET['remove']);
    unset($_SESSION["cart"][$id]);
    unset($_GET['remove']);
    header('Location: /cart');
}

echo $twig->render('cart.html.twig', ['cart_php' => $_SESSION['cart'], 'next_step_cart_link' => $next_step_cart_link]);
