<?php

require "dbConfig.php";

if (isset($_POST['upload'])) {
    
    $target = "images/".basename($_FILES['image']['name']);

    $image = $_FILES['image']['name'];
    $staff_name = $_POST['staff_name'];
    $description = $_POST['description'];

    $sql = "INSERT INTO images (images,staff_name, description) VALUES ('$image', '$staff_name', '$description') ";

    $query = mysqli_query($conn, $sql);

    if (!$query) {
       echo "faled to post";
    }else {
        
    $overall = move_uploaded_file($_FILES['image']['tmp_name'], $target);

    if ($overall) {
        $msg = "Uploaded Successfully";
    }else{
        $msg = "Uploading failed";
    }

    }

}


?>
<html>
<head>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</head>
<body>

<form action="" method="post" enctype = "multipart/form-data">
    <input type="hidden" name="size" value = "1000000" >
    <input type="file" name="image">
    <input type="description" name="staff_name" placeholder = "Enter Name" class= "description"  >
    <input type="description" name="description" placeholder = "Enter Description" class= "description"  > 
    <input type="submit" class="btn btn-primary" name = "upload"  value="upload">

</form>


<?php

require "dbConfig.php";

$sql = "SELECT * FROM images ORDER by id  DESC";


$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)){
    echo "<div class='card' style='width: 18rem; margin-top:20px;' >";
    echo "<img class='card-img-top' style='height: 14rem;' src = 'images/".$row['images']."' />";
    echo "<div class='card-body'>";
    echo "<p class='card-title'>" .$row['staff_name']."</p>";
    echo "<p class='card-text' >" .$row['description']."</p>";
    echo '<a class="card-link" href = "viewDoc.php?id= '.$row['id'].'">View</a>';
    echo "</div>";
    echo "</div>";
}

?>

</body>
</html>