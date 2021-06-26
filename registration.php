<?php

$komunikat=' ';

if (isset($_POST['new_name']) && isset($_POST['new_surname']) && isset($_POST['new_email']) && isset($_POST['new_phonenumber']) && isset($_POST['new_password']) && isset($_POST['new_password_confirm']) ) {
    $new_name = $_POST['new_name'];
    $new_surname = $_POST['new_surname'];
    $new_email = $_POST['new_email'];
    $new_phonenumber = $_POST['new_phonenumber'];
    $new_password = $_POST['new_password'];
    $new_password_confirm = $_POST['new_password_confirm'];

    $ip = $_SERVER['REMOTE_ADDR'];

   // $recaptcha = new \ReCaptcha\ReCaptcha('6LcrreYUAAAAALTdoToeer_H4NZ1ECK4U76g0huL');
   // $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

  //  if ($resp->isSuccess()) {
    if(strlen($new_password)>7){
        if ($new_password == $new_password_confirm) {
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);
            if (preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $new_email)) {
                try {
                    $stmt = $dbh->prepare('INSERT INTO users (id, name, surname, email, phonenumber, password, created) VALUES (null, :name, :surname, :email, :phonenumber, :password, NOW())');
                    $stmt->execute([':name' => $new_name, ':surname' => $new_surname, ':email' => $new_email, ':phonenumber' => $new_phonenumber, ':password' => $new_password]);
                    $komunikat = "Konto zostało założone.";
                } catch (PDOException $e) {
                    $komunikat = "Podany adres email jest już zajęty.";
                }
            } else {
                $komunikat = "Podany adres email jest niepoprawny.";
            }
        } else {
            $komunikat = "Podane hasła różnią się.";
        }
    } else {
        $komunikat = "Hasło musi mieć co najmniej 7 znaków.";
        echo '<script type="text/JavaScript"> 
                          alert("Hasło musi mieć co najmniej 7 znaków.");
                          </script>';
    }
   /* } else {
        print '<span style="color: red;">Serio jesteś robotem?</span>';
    }*/
}

echo $twig->render('registration.html.twig', ['komunikat'=>$komunikat]);
?>
