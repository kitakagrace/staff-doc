<?php

require "dbConfig.php";

if (isset($_GET['id'])) {
    $doc_id = $_GET['id'];

    $record = mysqli_query($conn, "SELECT * FROM images  WHERE id = $doc_id ");

    if(mysqli_num_rows($record) == 1){
        $n = mysqli_fetch_array($record);

        $description  = $n['description'];
        $image = $n['images'];

        echo "<div class='one-result'>";
        echo "<img src = 'images/".$image."' />";
        echo "<p>".$description. "</p>";
        echo  "</div>";
    }else{
        echo "no record";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>