<?php

if (isset($_GET['code'])){
    foreach($_SESSION["cart"] as $k => $v) {
        if ($_GET["code"] == $k)
            unset($_SESSION["cart"][$k]);
    }
}

header('Location: /cart');