<?php

echo $twig->render('movies_head.html.twig', []);

if (isset($_GET['show']) && intval($_GET['show']) > 0) {
    $id = intval($_GET['show']);
    $stmt = $dbh->prepare("SELECT * FROM movies WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if (isset($row['id'])) {

        $title = htmlspecialchars($row['title'], ENT_QUOTES | ENT_HTML401);
        $detailed_description = htmlspecialchars($row['detailed_description'], ENT_QUOTES | ENT_HTML401);
        $genre = htmlspecialchars($row['genre'], ENT_QUOTES | ENT_HTML401);
        $duration = intval($row['duration']);
        $production = htmlspecialchars($row['production'], ENT_QUOTES | ENT_HTML401);
        $direction = htmlspecialchars($row['direction'], ENT_QUOTES | ENT_HTML401);
        $poster_path = htmlspecialchars($row['poster_path'], ENT_QUOTES | ENT_HTML401);
        $available_date = $row['available_date'];
        $expiration_date = $row['expiration_date'];
        $ticket_price = intval($row['ticket_price']);
        $trailer_URL = htmlspecialchars($row['trailer_URL']);

        echo $twig->render('movie_show.html.twig', [
            'id' => $id,
            'title' => $title,
            'detailed_description' => $detailed_description,
            'genre' => $genre,
            'duration' => $duration,
            'production' => $production,
            'direction' => $direction,
            'poster_path' => $poster_path,
            'available_date' => $available_date,
            'expiration_date' => $expiration_date,
            'ticket_price' => $ticket_price,
            'trailer_URL' => $trailer_URL
        ]);
    }
    else{
        // Page error
    }
}

else if(isset($_GET['search'])){
    $title = htmlspecialchars($_GET['search'], ENT_QUOTES | ENT_HTML401);
    $stmt = $dbh->prepare("SELECT * FROM movies WHERE title = :title");
    $stmt -> execute([':title' => $title]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $id = intval($row['id']);
    $title = htmlspecialchars($row['title'], ENT_QUOTES | ENT_HTML401);
    $short_description = htmlspecialchars($row['short_description'], ENT_QUOTES | ENT_HTML401);
    $genre = htmlspecialchars($row['genre'], ENT_QUOTES | ENT_HTML401);
    $duration = intval($row['duration']);
    $production = htmlspecialchars($row['production'], ENT_QUOTES | ENT_HTML401);
    $direction = htmlspecialchars($row['direction'], ENT_QUOTES | ENT_HTML401);
    $poster_path = htmlspecialchars($row['poster_path'], ENT_QUOTES | ENT_HTML401);
    $available_date = $row['available_date'];

    echo $twig->render('movies.html.twig', [
        'id' => $id,
        'title' => $title,
        'short_description' => $short_description,
        'genre' => $genre,
        'duration' => $duration,
        'production' => $production,
        'direction' => $direction,
        'poster_path' => $poster_path,
        'available_date' => $available_date
    ]);

}

// Showing all the movies when id is not given
else {
    $stmt = $dbh->prepare("SELECT * FROM movies ORDER BY available_date DESC");
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $id = intval($row['id']);
        $title = htmlspecialchars($row['title'], ENT_QUOTES | ENT_HTML401);
        $short_description = htmlspecialchars($row['short_description'], ENT_QUOTES | ENT_HTML401);
        $genre = htmlspecialchars($row['genre'], ENT_QUOTES | ENT_HTML401);
        $duration = intval($row['duration']);
        $production = htmlspecialchars($row['production'], ENT_QUOTES | ENT_HTML401);
        $direction = htmlspecialchars($row['direction'], ENT_QUOTES | ENT_HTML401);
        $poster_path = htmlspecialchars($row['poster_path'], ENT_QUOTES | ENT_HTML401);
        $available_date = $row['available_date'];

        echo $twig->render('movies.html.twig', [
            'id' => $id,
            'title' => $title,
            'short_description' => $short_description,
            'genre' => $genre,
            'duration' => $duration,
            'production' => $production,
            'direction' => $direction,
            'poster_path' => $poster_path,
            'available_date' => $available_date
        ]);
    }
}
