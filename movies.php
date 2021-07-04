<?php

echo $twig->render('movies_head.html.twig', []);

// Movie detailed
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
        $movie_hours = htmlspecialchars($row['movie_hours'], ENT_QUOTES | ENT_HTML401);
        $trailer_URL = htmlspecialchars($row['trailer_URL']);
        $current_date = date("Y-m-d");

        $movie_hours = explode(',', $movie_hours);
        $movie_dates = [];

        $date = $current_date;
//        while($date <= $expiration_date){
//            array_push($movie_dates, $date);
//            $date = date_modify($date, '+1 day');
//        }


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
            'movie_hours' => $movie_hours,
            'trailer_URL' => $trailer_URL,
            'movie_dates' => $movie_dates
        ]);
    }
    else{
        echo $twig->render('movies_error.html.twig', []);
    }
}

// Search for given movie
else if(isset($_POST['search'])){
    $search = htmlspecialchars($_POST['search'], ENT_QUOTES | ENT_HTML401);
    $search = "%" . $search . "%";
    $stmt = $dbh->prepare("SELECT * FROM movies WHERE title LIKE :title");
    $stmt -> execute([':title' => $search]);

    if($stmt->columnCount() > 0) {
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
    else{
        echo $twig->render('movies_error.html.twig', []);
    }

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
