<?php

echo $twig->render('cart2.html.twig', []);

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

} else {

}