<?php

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    header('Location: /cart/delivery-and-payment');
} else {
    echo $twig->render('cart2.html.twig', []);
}

