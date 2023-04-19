<?php
$apiKey = "AIzaSyDXZRhfokXwJEuk2NCQvoeqZgvXBb0976Y";
$cx = "306e151aa2bfd44fe";
$search = "apple";
if (isset($_GET['search'])){
    $search = $_GET['search'];
}
$url = "https://www.googleapis.com/customsearch/v1?key={$apiKey}&cx={$cx}&q={$search}";
$ch = curl_init();
curl_setopt ($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$resultJson = curl_exec($ch);
curl_close($ch);
$arr = json_decode($resultJson, true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h3>My Browser</h3>
<form method="GET" action="/index.php">
    <label for="url">Url:</label>
    <input type="text" id="url" name="url" value="">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
    <h2>Search result</h2>
</ form >
<?php
foreach ($arr['items'] as $item) {
    echo '<b>'.$item['displayLink'] . '</b>' . '<br>';
    echo '<h3>' . "<a href='{$item['title']}'>".$item['title'] . '</a>' . '</h3>' ;
    echo '<p>'.$item['snippet'] . '</p>' . '<br>';
}
?>
</body>
</html>