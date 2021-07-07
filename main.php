<?php


$stmt = $dbh->prepare("SELECT * FROM movies ORDER BY available_date DESC");
$stmt->execute();

$id = array();
$poster_paths = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    array_push($id, $row['id']);
    array_push($poster_paths, htmlspecialchars($row['poster_path'], ENT_QUOTES | ENT_HTML401));

}

$array_length = count($id);

echo $twig->render('main.html.twig', [
    'id' => $id,
    'poster_path' => $poster_paths,
    'array_length' => $array_length,
]);