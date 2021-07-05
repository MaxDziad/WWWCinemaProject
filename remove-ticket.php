<?php

if (isset($_GET['remove'])){
    foreach ($_SESSION["cart"] as $key => $value) {
        if ($_GET["remove"] === $key) {
            unset($_SESSION["cart"][$key]);
        }
    }
    header('Location: /cart');
}

