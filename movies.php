<?php

echo $twig->render('movies_head.html.twig', []);

$stmt = $dbh->prepare("SELECT * FROM movies ORDER BY available_date DESC");
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $title = htmlspecialchars($row['title'], ENT_QUOTES | ENT_HTML401);
    $short_description = htmlspecialchars($row['short_description'], ENT_QUOTES | ENT_HTML401);
    $genre = htmlspecialchars($row['genre'], ENT_QUOTES | ENT_HTML401);
    $duration = intval($row['duration']);
    $production = htmlspecialchars($row['production'], ENT_QUOTES | ENT_HTML401);
    $direction = htmlspecialchars($row['direction'], ENT_QUOTES | ENT_HTML401);
    $poster_path = htmlspecialchars($row['poster_path'], ENT_QUOTES | ENT_HTML401);
    $available_date = $row['available_date'];

    echo $twig->render('movies.html.twig', [
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
