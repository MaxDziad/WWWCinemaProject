<?php
echo $twig->render('login.html.twig', []);

if (isset($_POST['login']) && isset($_POST['password'])) {

    $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $_POST['login']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($_POST['password'], $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            print '<span style="color: red;">ZALOGOWANO</span>';
        }
    }
}

?>