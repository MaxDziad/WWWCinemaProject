<?php

if (empty($_SESSION['cart'])) {
    header('Location: /cart');
} else {
    echo $twig->render('cart2.html.twig', []);
}