<?php

//tu ma być takie coż że jak koszyk jest pusty to automatycznie wraca na strone główną albo do pierwszego kroku koszyka

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

    $id = $_SESSION['id'];
    $email = $_SESSION['email'];
    $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id AND email = :email");
    $stmt -> execute([':id' => $id, ':email' => $email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = htmlspecialchars($user['name'], ENT_QUOTES | ENT_HTML401);
    $surname = htmlspecialchars($user['surname'], ENT_QUOTES | ENT_HTML401);
    $address = htmlspecialchars($user['address'], ENT_QUOTES | ENT_HTML401);
    $address_cd = htmlspecialchars($user['address_cd'], ENT_QUOTES | ENT_HTML401);
    $postcode = htmlspecialchars($user['postcode'], ENT_QUOTES | ENT_HTML401);
    $city = htmlspecialchars($user['city'], ENT_QUOTES | ENT_HTML401);
    $email = htmlspecialchars($user['email'], ENT_QUOTES | ENT_HTML401);
    $phone_number = htmlspecialchars($user['phone_number'], ENT_QUOTES | ENT_HTML401);

    echo $twig->render('cart3.html.twig', [
        'name' => $name,
        'surname' => $surname,
        'address' => $address,
        'address_cd' => $address_cd,
        'postcode' => $postcode,
        'city' => $city,
        'email' => $email,
        'phone_number' => $phone_number
    ]);

} else {

    $name = '';
    $surname = '';
    $address = '';
    $address_cd = '';
    $postcode = '';
    $city = '';
    $email = '';
    $phone_number = '';

    echo $twig->render('cart3.html.twig', [
        'name' => $name,
        'surname' => $surname,
        'address' => $address,
        'address_cd' => $address_cd,
        'postcode' => $postcode,
        'city' => $city,
        'email' => $email,
        'phone_number' => $phone_number
    ]);

}

