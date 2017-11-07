<?php

$url = "https://api.unsplash.com/";

$appId = "40b906afe4c1f493220e58a0c3ecb70034d9887fceac31830df9f0864db8d85f";
$url .= "collections/featured";
$url .= "?" . http_build_query([
    "client_id" => $appId,
    "per_page" => 30
]);



$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLINFO_HEADER_OUT => true
]);



$response = curl_exec($ch);

curl_close($ch);

$collections = json_decode($response, true);
var_dump($collections[0]);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="API.front.css">
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
    <title>Document</title>
</head>
<body>


    <div class="grid" data-masonry='{ "itemSelector": ".grid-item", "columnWidth": 200, "gutter" :5}'>

<?php
foreach ($collections as $tab) { 
$img = $tab['cover_photo']['urls']['thumb'];
?>

    <a class="coll" href="#">

    <img src="<?= $img ?>" alt="<?= $tab["title"] ?>">
    <p>
        <a href="API.photographer.php?id=<?= $tab["user"]["id"] ?>">
            <?= $tab["user"]["name"] ?>
        </a>
    </p>
    
    <h3>
        <a href="API.collection.php?id=<?= $tab["id"] ?>">
            <?= $tab["title"] ?>
        </a>
    </h3>

</a>

    <?php
    }
?>

</div>

</body>
</html>

