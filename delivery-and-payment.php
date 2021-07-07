<?php

if (empty($_SESSION['cart'])) {
    header('Location: /cart');
} else {
    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {

        $id = $_SESSION['id'];
        $email = $_SESSION['email'];
        $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id AND email = :email");
        $stmt->execute([':id' => $id, ':email' => $email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $name = htmlspecialchars($user['name'], ENT_QUOTES | ENT_HTML401);
        $surname = htmlspecialchars($user['surname'], ENT_QUOTES | ENT_HTML401);
        $address = htmlspecialchars($user['address'], ENT_QUOTES | ENT_HTML401);
        $address_cd = htmlspecialchars($user['address_cd'], ENT_QUOTES | ENT_HTML401);
        $postcode = htmlspecialchars($user['postcode'], ENT_QUOTES | ENT_HTML401);
        $city = htmlspecialchars($user['city'], ENT_QUOTES | ENT_HTML401);
        $email = htmlspecialchars($user['email'], ENT_QUOTES | ENT_HTML401);
        $phone_number = htmlspecialchars($user['phone_number'], ENT_QUOTES | ENT_HTML401);

    } else {
        $id = 0;
        $name = '';
        $surname = '';
        $address = '';
        $address_cd = '';
        $postcode = '';
        $city = '';
        $email = '';
        $phone_number = '';
    }

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

        $recaptcha = new \ReCaptcha\ReCaptcha('6LcrreYUAAAAALTdoToeer_H4NZ1ECK4U76g0huL');
        $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        if ($resp->isSuccess()) {
            if ($name == '' || $surname == '' || $address == '' || $address_cd == '' || $postcode == '' || $city == '' ||$email == '' || $phone_number == '') {
                $message = "Pola nie mogą być puste.";
            } else {
                if (!preg_match('/^([1-9][0-9]*[a-zA-z]{0,1}[\/]{0,1}[0-9]*)$/D', $address_cd)) {
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
                                    $message = "Nie wybrano formy dostawy.";
                                } else {
                                    $delivery = $_POST['delivery'];
                                    if (!isset($_POST['payment'])) {
                                        $message = "Nie wybrano formy płatności.";
                                    } else {
                                        $payment = $_POST['payment'];
                                        if ($_POST['delivery']=="e-ticket" && $_POST['payment']=="by-collection") {
                                            $message = "Bilet elektroniczny jest dostępny tylko przy płatności przelewem.";
                                        } else {
                                            $agreement = true;
                                            foreach ($_SESSION['cart'] as $key => $value) {
                                                $stmt = $dbh->prepare("SELECT * FROM tickets WHERE title = :title AND date = :date AND time = :time ");
                                                $stmt->execute([':title' => $_SESSION['cart'][$key]['title'], ':date' => $_SESSION['cart'][$key]['date'], ':time' => $_SESSION['cart'][$key]['time']]);
                                                $amountOfSoldTicket = $stmt->rowCount();

                                                $ticketsInCart = 0;
                                                foreach ($_SESSION['cart'] as $ticket) {
                                                    if ($ticket['title'] == $_SESSION['cart'][$key]['title'] && $ticket['date'] == $_SESSION['cart'][$key]['date'] && $ticket['time'] == $_SESSION['cart'][$key]['time']) {
                                                        $ticketsInCart++;
                                                    }
                                                }

                                                $maxAmountOfTickets = 3;
                                                if ($amountOfSoldTicket + $ticketsInCart > $maxAmountOfTickets) {
                                                    if (count($_SESSION['cart']) == 1) {
                                                        $message = 'Nie możesz kupić biletu, który masz w koszyku. Prawdopodobnie kupił go już ktoś inny. Usuń bilet, wybierz nowy i spróbuj jeszcze raz.';
                                                    } else {
                                                        $message = 'Nie możesz kupić wszystkich biletów, które masz w koszyku. Prawdopodobnie niektóre z nich kupił już ktoś inny. Usuń bilety, wybierz nowe i spróbuj jeszcze raz.';
                                                    }
                                                    $agreement = false;
                                                }
                                            }

                                            if (!$agreement) {
                                                echo "<script type='text/javascript'>alert('$message'); window.location = '/cart';</script>";
                                            } else {
                                                foreach ($_SESSION['cart'] as $key => $value) {
                                                    try {
                                                        $ticket = $_SESSION['cart'][$key];
                                                        $stmt = $dbh->prepare('INSERT INTO tickets (id, title, date, time, price, id_client, name, surname, address, address_cd, postcode, city, email, phone_number, delivery, payment, created) VALUES (null, :title, :date, :time, :price, :id_client, :name, :surname, :address, :address_cd, :postcode, :city, :email, :phone_number, :delivery, :payment, NOW())');
                                                        $stmt->execute([':title' => $ticket['title'], ':date' => $ticket['date'], ':time' => $ticket['time'], ':price' => $ticket['price'], ':id_client' => $id, ':name' => $name, ':surname' => $surname, ':address' => $address, ':address_cd' => $address_cd, ':postcode' => $postcode, ':city' => $city, ':email' => $email, ':phone_number' => $phone_number, ':delivery' => $delivery, ':payment' => $payment]);
                                                    } catch (PDOException $e) {}
                                                }
                                                unset($_SESSION['cart']);
                                                header('Location: /');
                                            }
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

    echo $twig->render('cart3.html.twig', [
        'name' => $name,
        'surname' => $surname,
        'address' => $address,
        'address_cd' => $address_cd,
        'postcode' => $postcode,
        'city' => $city,
        'email' => $email,
        'phone_number' => $phone_number,
        'message' => $message,
        'cart_php' => $_SESSION['cart']
    ]);
}


