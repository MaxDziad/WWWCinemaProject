<?php

$message = '';

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['address']) && isset($_POST['address_cd']) && isset($_POST['postcode']) && isset($_POST['city']) && isset($_POST['email']) && isset($_POST['phone_number'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $address = $_POST['address'];
    $address_cd = $_POST['address_cd'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $delivery = $_POST['delivery'];
    $payment = $_POST['payment'];

    $recaptcha = new \ReCaptcha\ReCaptcha('6LcrreYUAAAAALTdoToeer_H4NZ1ECK4U76g0huL');
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if ($resp->isSuccess()) {
        if ($name == '' || $surname == '' || $address == '' || $address_cd == '' || $postcode == '' || $city == '' ||$email == '' || $phone_number == '') {
            $message = "Pola nie mogą być puste.";
        } else {
            if (!preg_match('/^([1-9][0-9]*[\/]{0,1}[0-9]*)$/D', $address_cd)) {
                $message = "Podany adres jest niepoprawny.";
            } else {
                if (!preg_match('/^([0-9]{2}-[0-9]{3})$/D', $postcode)) {
                    $message = "Podany kod pocztowy jest niepoprawny.";
                } else {
                    if (!preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $email)) {
                        $message = "Podany email jest niepoprawny.";
                    } else {
                        if (!preg_match('/^[0-9]{9}$/', $phone_number)) {
                            $message = "Podany numer telefonu jest niepoprawny.";
                        } else {
                            if (!isset($_POST['delivery'])) {
                                $message = "Nie wybrano sposobu dostawy.";
                            } else {
                                if (!isset($_POST['payment'])) {
                                    $message = "Nie wybrano sposobu płatności";
                                } else {
                                    if ($_POST['delivery']=="e-ticket" && $_POST['payment']=="transfer") {
                                        $message = "Bilet elektroniczny jest dostępny tylko przy płatności przelewem.";
                                    } else {
                                        echo $twig->render('registration.html.twig', ['message' => $message]);
                                       /*  try {
                                             $stmt = $dbh->prepare('INSERT INTO users (id, name, surname, address, address_cd, postcode, city, email, phone_number, password, created) VALUES (null, :name, :surname, :address, :address_cd, :postcode, :city, :email, :phone_number, :password, NOW())');
                                             $stmt->execute([':name' => $name, ':surname' => $surname, ':address' => $address, ':address_cd' => $address_cd, ':postcode' => $postcode, ':city' => $city, ':email' => $email, ':phone_number' => $phone_number, ':password' => $new_password]);
                                             $message = "Konto zostało zarejestrowane.";
                                         } catch (PDOException $e) {
                                             $message = "Podany adres email jest już zajęty.";
                                         }*/
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    } else {
        $message = "Serio jesteś robotem?";
    }
}

echo $twig->render('cart3.html.twig', ['message' => $message]);
