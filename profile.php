<?php

//Moje konto:
$stmt = $dbh->prepare("SELECT * FROM tickets WHERE id_client = :id");
$stmt->execute([':id' => $_SESSION['id']]);
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


if (isset($_POST['current_password']) && isset($_POST['changed_password']) && isset($_POST['changed_password_repeat'])) {

    $current_password = $_POST['current_password'];
    $changed_password = $_POST['changed_password'];
    $changed_password_repeat = $_POST['changed_password_repeat'];

    if ($current_password == '' || $changed_password == '' || $changed_password_repeat == '') {
        $message = "Pola nie mogą być puste.";
    } else {
        if (password_verify($current_password, $user['password']) == false) {
            $message = "Aktualne hasło jest niepoprawne.";
        } elseif (strcmp($changed_password, $changed_password_repeat) !== 0) {
            $message = "Nowe hasła różnią się.";
        } elseif (strlen($changed_password) < 6) {
            $message = "Hasło musi mieć co najmniej 6 znaków.";
        } else {
            $changed_password = password_hash($changed_password, PASSWORD_DEFAULT);
            $stmt = $dbh->prepare('UPDATE users SET `password` = :password WHERE id = :id');
            $stmt->execute([':password' => $changed_password, ':id' => $user['id']]);
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
$email = $user['email'];
$phone_number = $user['phone_number'];
$message2 = "";

if (isset($_POST['changed_name']) && isset($_POST['changed_surname']) && isset($_POST['changed_address']) && isset($_POST['changed_address_cd']) && isset($_POST['changed_postcode']) && isset($_POST['changed_city']) && isset($_POST['changed_phone_number']) && isset($_POST['changed_email'])) {

    $changed_name = $_POST['changed_name'];
    $changed_surname = $_POST['changed_surname'];
    $changed_address = $_POST['changed_address'];
    $changed_address_cd = $_POST['changed_address_cd'];
    $changed_postcode = $_POST['changed_postcode'];
    $changed_city = $_POST['changed_city'];
    $changed_phone_number = $_POST['changed_phone_number'];
    $changed_email = $_POST['changed_email'];

    if ($changed_name == '' || $changed_surname == '' || $changed_address == '' || $changed_address_cd == '' || $changed_postcode == '' || $changed_city == '' || $changed_email == '' || $changed_phone_number == '') {
        $message2 = "Pola nie mogą być puste.";
    } else {
        if (!preg_match('/^([1-9][0-9]*[a-zA-z]{0,1}[\/]{0,1}[0-9]*)$/D', $changed_address_cd)) {
            $message2 = "Podany adres jest niepoprawny.";
        } else {
            if (!preg_match('/^([0-9]{2}-[0-9]{3})$/D', $changed_postcode)) {
                $message2 = "Podany kod pocztowy jest niepoprawny.";
            } else {
                if (!preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $changed_email)) {
                    $message2 = "Podany email jest niepoprawny.";
                } else {
                    if (!preg_match('/^[0-9]{9}$/', $changed_phone_number)) {
                        $message2 = "Podany numer telefonu jest niepoprawny.";
                    } else {
                        try {
                            $stmt_2 = $dbh->prepare('UPDATE users SET name = :name, surname = :surname, address = :address, address_cd = :address_cd, postcode = :postcode, city = :city, phone_number = :phone_number, email = :email WHERE id = :id');
                            $stmt_2->execute([':name' => $changed_name, ':surname' => $changed_surname, ':address' => $changed_address, ':address_cd' => $changed_address_cd, ':postcode' => $changed_postcode, ':city' => $changed_city, ':phone_number' => $changed_phone_number, ':email' => $changed_email, ':id' => $user['id']]);
                            $message2 = "Dane zostały zmienione.";
                            header('Location: /profile');
                        }  catch (PDOException $e) {
                            $message2 = "Podany email jest już zajęty.";
                        }
                    }
                }
            }
        }
    }
}

$message3="";

if (isset($_POST['password_confirm'])) {
    $password_confirm = $_POST['password_confirm'];

    if ($password_confirm == "") {
        $message3 = "Musisz podać hasło.";
    } else {
        if(password_verify($password_confirm, $user['password'])){
            $stmt = $dbh->prepare('DELETE FROM users WHERE id = :id');
            $stmt->execute([':id' => $user['id']]);
            header('Location: /logout');
        }else{
            $message3 = "Podane hasło jest błędne.";
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

