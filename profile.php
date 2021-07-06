<?php

//Moje konto:
$email = $_SESSION['email'];
$stmt = $dbh->prepare("SELECT * FROM tickets WHERE email = :email ORDER BY 'date', time ");
$stmt->execute([':email' => $_SESSION['email']]);
$title = array();
$date = array();
$time = array();
$i = 0;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $i++;
    array_push($title, html_entity_decode($row['title']));
    array_push($date, date($row['date']));
    array_push($time, $row['time']);
}

//Zmień hasło:
$message = "";
$stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
$stmt->execute([':email' => $_SESSION['email']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['repeat_password'])) {

    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $repeat_password = $_POST['repeat_password'];

    if ($old_password == '' || $new_password == '' || $repeat_password == '') {
        $message = "Pola nie mogą być puste.";
    } else {


        if (password_verify($old_password, $user['password']) == false) {
            $message = "Aktualne hasło jest niepoprawne";
        } elseif (strcmp($new_password, $repeat_password) !== 0) {
            $message = "Nowe hasła różnią się";
        } elseif (strlen($new_password) < 6) {
            $message = "Hasło musi mieć co najmniej 6 znaków.";
        } else {
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);

            $stmt = $dbh->prepare('UPDATE users SET `password` = :password WHERE id = :id');
            $stmt->execute([':password' => $new_password, ':id' => $user['id']]);
            $message = "Hasło zostało zmienione.";


        }
    }
}

//Zmień dane osobowe:
$address = $user['address'];
$address_cd = $user['address_cd'];
$postcode = $user['postcode'];
$city = $user['city'];
$phone = $user['phone_number'];
$message2 = "";

if (isset($_POST['address']) && isset($_POST['address_cd']) && isset($_POST['postcode']) && isset($_POST['city']) && isset($_POST['phone-number']) && isset($_POST['password-verify'])) {
    $new_address = $_POST['address'];
    $new_address_cd = $_POST['address_cd'];
    $new_postcode = $_POST['postcode'];
    $new_city = $_POST['city'];
    $new_phone_number = $_POST['phone-number'];
    $password_verify = $_POST['password-verify'];

    if ($password_verify = "") {
        $message2 = "Musisz podać hasło";
    } else {
        if (password_verify($password_verify, $user['password'])) {

            if (($new_address == "" && $new_address_cd == "" && $new_postcode == "" && $new_city == "" && $new_phone_number == "") == false) {
                if (!preg_match('/^([1-9][0-9]*[a-zA-z]{0,1}[\/]{0,1}[0-9]*)$/D', $new_address_cd) && $new_address_cd != "") {
                    $message2 = $message2 . "Podany adres jest niepoprawny. ";
                } elseif (!preg_match('/^([0-9]{2}-[0-9]{3})$/D', $new_postcode) && $new_postcode != "") {
                    $message2 = $message2 . "Podany kod pocztowy jest niepoprawny.";
                } elseif (!preg_match('/^[0-9]{9}$/', $new_phone_number) && $new_phone_number != "") {
                    $message2 = $message2 . "Podany numer telefonu jest niepoprawny. ";
                } else {

                    if ($new_address == "") {
                        $new_address = $user['address'];
                    }
                    if ($new_address_cd == "") {
                        $new_address_cd = $user['address_cd'];
                    }
                    if ($new_postcode == "") {
                        $new_postcode = $user['postcode'];
                    }
                    if ($new_city == ""){
                        $new_city = $user['city'];
                    }
                    if ($new_phone_number == ""){
                        $new_phone_number = $user['phone_number'];
                    }

                        $stmt = $dbh->prepare('UPDATE users SET (address = :address, address_cd = :address_cd, postcode = :postcode, city = :city, phone_number = :phone_number)  WHERE id = :id');
                    $stmt->execute([':address' => $new_address, ':address_cd' => $new_address_cd, ':postcode' => $new_postcode, ':city' => $city, ':phone_number' => $new_phone_number, ':id' => $user['id']]);
                    $message = "Dane zostały pomyśłnie zmienione.";
                }
            } else {
                $message2 = "Edytuj jedno z pól, którego wartość chcesz zmienić. ";

            }

        } else {
            $message2 = "Hasło jest niepoprawne. ";
        }
    }
}

//przekazanie danych do twiga



echo $twig->render('profile.html.twig', [
    /*data to tickets:*/
    'iterate' => $i,
    'title' => $title,
    'date' => $date,
    'time' => $time,

    /*data to password changing*/
    'message_password' => $message,

    /*data to personal info changing */
    'address' => $address,
    'addresscd' => $address_cd,
    'postcode' => $postcode,
    'city' => $city,
    'phone' => $phone,
    'message_user' => $message2,

]);


