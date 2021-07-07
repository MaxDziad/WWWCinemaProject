<?php

//Moje konto:
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
$stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id");
$stmt->execute([':id' => $_SESSION['id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


if (isset($_POST['current_password']) && isset($_POST['change_password']) && isset($_POST['change_password_repeat'])) {

    $old_password = $_POST['current_password'];
    $new_password = $_POST['change_password'];
    $repeat_password = $_POST['change_password_repeat'];

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
$name = $user['name'];
$surname = $user['surname'];
$address = $user['address'];
$address_cd = $user['address_cd'];
$postcode = $user['postcode'];
$city = $user['city'];
$phone_number = $user['phone_number'];
$email = $user['email'];
$message2 = "";

if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['address']) && isset($_POST['address_cd']) && isset($_POST['postcode']) && isset($_POST['city']) && isset($_POST['phone_number']) && isset($_POST['email'])) {

    $new_name = $_POST['name'];
    $new_surname = $_POST['surname'];
    $new_address = $_POST['address'];
    $new_address_cd = $_POST['address_cd'];
    $new_postcode = $_POST['postcode'];
    $new_city = $_POST['city'];
    $new_phone_number = $_POST['phone_number'];
    $new_email = $_POST['email'];
//    $password_verify = $_POST['password-verify'];


    if (($name == "" && $surname == "" && $new_address == "" && $new_address_cd == "" && $new_postcode == "" && $new_city == "" && $new_phone_number == "") == false) {
        if (!preg_match('/^([1-9][0-9]*[a-zA-z]{0,1}[\/]{0,1}[0-9]*)$/D', $new_address_cd) && $new_address_cd != "") {
            $message2 = $message2 . "Podany adres jest niepoprawny. ";
        } elseif (!preg_match('/^([0-9]{2}-[0-9]{3})$/D', $new_postcode) && $new_postcode != "") {
            $message2 = $message2 . "Podany kod pocztowy jest niepoprawny.";
        } elseif (!preg_match('/^[0-9]{9}$/', $new_phone_number) && $new_phone_number != "") {
            $message2 = $message2 . "Podany numer telefonu jest niepoprawny. ";
        } elseif (!preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $new_email)) {
            $message2 = $message2 . "Podany email jest niepoprawny.";
        } else {

            $stmt = $dbh->prepare('UPDATE users SET name = :name, surname = :surname, address = :address, address_cd = :address_cd, postcode = :postcode, city = :city, phone_number = :phone_number, email = :email WHERE id = :id');
            $stmt->execute([':name' => $new_name, ':surname' => $new_surname, ':address' => $new_address, ':address_cd' => $new_address_cd, ':postcode' => $new_postcode, ':city' => $new_city, ':phone_number' => $new_phone_number, ':email' => $new_email, ':id' => $user['id']]);
            $message2 = "Dane zostały pomyślnie zmienione.";
        }
    } else {
        $message2 = "Edytuj jedno z pól, którego wartość chcesz zmienić. ";

    }

//    } else {
//        $message2 = "Hasło jest niepoprawne. ";
//    }
//    }
}
$message3="";

if (isset($_POST['password_confirm'])) {
    $password_confirm = $_POST['password_confirm'];

    if ($password_confirm = "") {
        $message3 = "Musisz podać hasło.";
    }else{
        if(password_verify($password_confirm,$user['password'])){
            $stmt = $dbh->prepare('DELETE FROM users WHERE id = :id');
            $stmt->execute([':id' => $user['id']]);
        }else{
            $message3 = "Hasło jest błędne.";
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
    'name' => $name,
    'surname' => $surname,
    'address' => $address,
    'address_cd' => $address_cd,
    'postcode' => $postcode,
    'city' => $city,
    'phone_number' => $phone_number,
    'email' => $email,
    'message_user' => $message2,

    /*data to deleting an account*/
    'message_delete' => $message3,

]);

