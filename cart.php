<?php

if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
    $next_step_cart_link = "/cart/delivery-and-payment";
} else {
    $next_step_cart_link = "/cart/selection";
}

if (isset($_POST['movieDate']) && isset($_POST['movieHour'])){

    $movieID = $_POST['movieID'];
    $movieTitle = $_POST['movieTitle'];
    $movieDate = $_POST['movieDate'];
    $movieHour = $_POST['movieHour'];

    $stmt = $dbh->prepare("SELECT * FROM tickets WHERE time = :time AND date = :date AND title = :title");
    $stmt->execute([':title' => $movieTitle, ':time' => $movieHour, ':date' => $movieDate]);

    // count similar tickets in cart
    $similarTicketsInCart = 0;
    foreach($_SESSION['cart'] as $ticket){
        if($ticket['title'] == $movieTitle && $ticket['date'] == $movieDate && $ticket['time'] == $movieHour){
            $similarTicketsInCart ++;
        }
    }

    $maxAmountOfTickets = 3;

    // check if tickets are available
    if($stmt->rowCount() + $similarTicketsInCart >= $maxAmountOfTickets) {
        if ($similarTicketsInCart !=0) {
            $message = "Nie można dodać więcej biletów na ten seans. W koszyku masz już maksymalną dostępną ilość. Wybierz inny dzień lub godzinę.";
        } else {
            $message = "Nie można dodać biletów na ten seans. Brak wolnych miejsc. Wybierz inny dzień lub godzinę.";
        }
        $link = '/movies/show/'.$movieID;
        echo "<script type='text/javascript'>alert('$message'); window.location = '$link';</script>";
    }
    else {
        // add ticket to cart
        $ticket = array(
            'title' => $movieTitle,
            'date' => $movieDate,
            'time' => $movieHour,
            'price' => 19.99
        );
        array_push($_SESSION['cart'], $ticket);
    }
}

if (isset($_GET['remove']) && intval($_GET['remove']) >= 0) {
    $id = intval($_GET['remove']);
    unset($_SESSION["cart"][$id]);
    $_SESSION["cart"] = array_values($_SESSION["cart"]);
    header('Location: /cart');
}

echo $twig->render('cart.html.twig', ['cart_php' => $_SESSION['cart'], 'next_step_cart_link' => $next_step_cart_link]);
