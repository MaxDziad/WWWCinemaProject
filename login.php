<?php

$komunikat = '';

if (isset($_POST['login']) && isset($_POST['password'])) {

    if ($_POST['login'] == '' || $_POST['password'] == '') {
        $komunikat = "Pola nie mogą być puste.";
    }
    else {
        $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([':email' => $_POST['login']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $komunikat = "Zalogowano pomyślnie.";
                header('Location: /');
                //exit();
            } else $komunikat = "Hasło niepoprawne.";
        } else $komunikat = "Nie ma takiego użytkownika.";
    }
}

echo $twig->render('login.html.twig', ['komunikat'=>$komunikat]);

?>