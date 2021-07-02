<?php

$message = '';

if (isset($_POST['new_name']) && isset($_POST['new_surname']) && isset($_POST['new_address']) && isset($_POST['new_address_cd']) && isset($_POST['new_postcode']) && isset($_POST['new_city']) && isset($_POST['new_email']) && isset($_POST['new_phone_number']) && isset($_POST['new_password']) && isset($_POST['new_password_confirm']) ) {
    $new_name = $_POST['new_name'];
    $new_surname = $_POST['new_surname'];
    $new_address = $_POST['new_address'];
    $new_address_cd = $_POST['new_address_cd'];
    $new_postcode = $_POST['new_postcode'];
    $new_city = $_POST['new_city'];
    $new_email = $_POST['new_email'];
    $new_phone_number = $_POST['new_phone_number'];
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_password_confirm'];

    $ip = $_SERVER['REMOTE_ADDR'];

    $recaptcha = new \ReCaptcha\ReCaptcha('6LcrreYUAAAAALTdoToeer_H4NZ1ECK4U76g0huL');
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    if ($resp->isSuccess()) {
        if($new_name=='' || $new_surname=='' || $new_email=='' || $new_phone_number=='' || $new_password=='' || $new_password_confirm==''){
            $message = "Pola nie mogą być puste.";
        }
        else {
            if (!preg_match('/^([1-9][0-9]*[\/]{0,1}[0-9]*)$/D', $new_address_cd)) {
                $message = "Podany adres jest niepoprawny.";
            } else {
                if (!preg_match('/^([0-9]{2}-[0-9]{3})$/D', $new_postcode)) {
                    $message = "Podany kod pocztowy jest niepoprawny.";
                } else {
                    if (!preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $new_email)) {
                        $message = "Podany email jest niepoprawny.";
                    } else {
                        if (!preg_match('/^[0-9]{9}$/', $new_phone_number)) {
                            $message = "Podany numer telefonu jest niepoprawny.";
                        } else {
                            if (strcmp($new_password, $new_password_confirm) !== 0) {
                                $message = "Podane hasła różnią się.";
                            } else {
                                if (strlen($new_password) < 6) {
                                    $message = "Hasło musi mieć co najmniej 6 znaków.";
                                } else {
                                    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
                                    try {
                                        $stmt = $dbh->prepare('INSERT INTO users (id, name, surname, address, address_cd, postcode, city, email, phone_number, password, created) VALUES (null, :name, :surname, :address, :address_cd, :postcode, :city, :email, :phone_number, :password, NOW())');
                                        $stmt->execute([':name' => $new_name, ':surname' => $new_surname, ':address' => $new_address, ':address_cd' => $new_address_cd, ':postcode' => $new_postcode, ':city' => $new_city, ':email' => $new_email, ':phone_number' => $new_phone_number, ':password' => $new_password]);
                                        $message = "Konto zostało zarejestrowane.";
                                    } catch (PDOException $e) {
                                        $message = "Podany adres email jest już zajęty.";
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

echo $twig->render('registration.html.twig', ['message'=>$message]);

?>
