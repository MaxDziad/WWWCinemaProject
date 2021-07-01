<?php


// Showing all the movies when id is not given
$stmt = $dbh->prepare("SELECT * FROM movies ORDER BY available_date DESC");
$stmt->execute();

$titles = array();
$poster_paths = array();
$i = 0;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC) and $i =8) {
    array_push($titles , htmlspecialchars($row['title'], ENT_QUOTES | ENT_HTML401));
    array_push($poster_paths, htmlspecialchars($row['poster_path'], ENT_QUOTES | ENT_HTML401));
    $i++;
}
echo $twig->render('main.html.twig', [
    'title' => $titles,
    'poster_path' => $poster_paths,
]);