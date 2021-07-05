<?php
$email = $_SESSION['email'];

$stmt = $dbh->prepare("SELECT * FROM tickets WHERE email = :email ");
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
echo $twig->render('profile.html.twig', [
    'iterate' => $i,
    'title' => $title,
    'date' => $date,
    'time' => $time,
]);

if (isset($_POST['old_password']) && isset($_POST['new_password']) && isset($_POST['repeat_password'])) {
    if ($_POST['old_password'] == '' || $_POST['new_password'] == '' || $_POST['repeat_password'] == '') {
        $message = "Pola nie mogą być puste.";
    }

    $stmt = $dbh->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute([':email' => $_POST['login']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $repeat_password = $_POST['repeat_password'];

    if ((password_verify($old_password, $user['password']))) {
        $message = "Aktualne hasło jest niepoprawne";
    } elseif (strcmp($new_password, $repeat_password)) {
        $message = "Nowe hasła różnią się";
    } elseif (strlen($new_password) < 6) {
        $message = "Hasło musi mieć co najmniej 6 znaków.";
    } else {
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);

            $stmt = $dbh->prepare('UPDATE users SET `password` = :password WHERE id = :id');
            $stmt->execute([':password' => $new_password, ':id' => $user['id']]);
            $message = "Hasło zostało zmienione.";
        echo $twig->render('profile.html.twig',['message'=>$message]);

};
}

