<?php

$username = $_GET["username"];


$url = "https://api.unsplash.com/";

$appId = "40b906afe4c1f493220e58a0c3ecb70034d9887fceac31830df9f0864db8d85f";

$url .= "users/" . $username ;
$url .= "?" . http_build_query([
    "client_id" => $appId,
]);

$ch = curl_init($url);

curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_SSL_VERIFYPEER => false,
    CURLINFO_HEADER_OUT => true
]);



$response = curl_exec($ch);

curl_close($ch);

$photographer = json_decode($response, true);
var_dump($photographer);


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
foreach ($collection as $tab) { 
$img = $tab['urls']['small'];

?>

<a class="coll">

    <img src="<?= $img ?>" alt="<?= $tab["description"] ?>">

        <a href="API.photographer.php?username=<?= $tab["user"]["username"] ?>">
            <?= $tab["user"] ?>
        </a>


</a>
<?php
    }
?>
</div>

</body>
</html>


