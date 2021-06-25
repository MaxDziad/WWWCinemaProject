<?php
echo $twig->render('login.html.twig', []);

if (isset($_POST['new_email']) && isset($_POST['new_password'])) {
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];

    $ip = $_SERVER['REMOTE_ADDR'];

    $recaptcha = new \ReCaptcha\ReCaptcha('6LcrreYUAAAAALTdoToeer_H4NZ1ECK4U76g0huL');
    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

    $new_password=password_hash($new_password, PASSWORD_DEFAULT);

    if ($resp->isSuccess()) {
        if(preg_match('/^[a-zA-Z0-9\-\_\.]+\@[a-zA-Z0-9\-\_\.]+\.[a-zA-Z]{2,5}$/D', $new_email)){
            try {
                $stmt = $dbh->prepare('INSERT INTO users (id, email, password, created) VALUES (null, :email, :password, NOW())');
                $stmt->execute([':email' => $new_email, ':password' => $new_password]);
                print '<span style="color: green;">Konto zostało założone.</span>';
            }catch (PDOException $e) {
                print '<span style="color: red;">Podany adres email jest już zajęty.</span>';
            }
        } else {
            print '<span style="color: red;">Podany adres email jest niepoprawny.</span>';
        }
    } else {
        print '<span style="color: red;">Serio jesteś robotem?</span>';
    }
}

?>