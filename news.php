<?php

$selected_category = $_GET['category'];
$url = 'data.json';
$data = file_get_contents($url);
$news = json_decode($data, true);
$articles = array();
foreach ($news as $article) {
    if (in_array($selected_category, $article['categories'])) {
        array_push ($articles, $article);
    }
}
usort($articles, function ($item1, $item2) {
    return $item2['created'] <=> $item1['created'];
});

$content = array_slice($articles,0,3);
usort($news, function ($item1, $item2) {
    return $item2['created'] <=> $item1['created'];
});
session_start();
if ($selected_category == 'Wszystkie') {
    $_SESSION['content']= $news;
} else {
    $_SESSION['content'] = $content;
}
header( "Location: index.php" );
die();

?>
