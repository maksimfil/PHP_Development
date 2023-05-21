<?php

$apiKey = "AIzaSyCKKJEO95EdXaoIaw3ccinFU-xtDyVExBs";
$cx = "b6e491b040f494a92";
$search = $_GET["search"];
$url = 'https://www.googleapis.com/customsearch/v1?key='.$apiKey.'&cx='.$cx.'&q='.$search;

$text = htmlspecialchars($_GET["search"]);
if (isset($text)) {
    echo $text;
}
echo $url;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h2>My Browser</h2>
<form method="GET" action="/lab02/lab2.php">
    <label for="search">Search:</label>
    <input type="text" id="search" name="search" value=""><br><br>
    <input type="submit" value="Submit">
</form >
<script async src="https://cse.google.com/cse.js?cx=b6e491b040f494a92">
</script>
<div class="gcse-search"></div>


<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// Парсимо відповідь в форматі JSON
$results = json_decode($response, true);

// Виводимо результати пошуку на сторінку
if (isset($results["items"])) {
    foreach ($results["items"] as $result) {
        echo "<a href='".$result["link"]."'>".$result["title"]."</a><br>";
        echo $result["snippet"]."<br><br>";
    }
} else {
    echo "No results found";
}
?>
</body>
</html>
