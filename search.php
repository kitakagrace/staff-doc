<html>
<head>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
    
<form action="" method="POST">
<input type="text" placeholder="Search members" class="search-box">
<input type="submit" class="btn btn-info" value="SEARCH" class="search-btn" style="margin-top:-10px">
</form>
<?php
require "dbConfig.php";

if (isset($_POST['search'])) {
    $search_query = $_POST['search'];

   $result = mysqli_query($conn, "SELECT * FROM images WHERE description LIKE '%$search_query%' OR staff_name LIKE '%$search_query%'  ");

   $count = mysqli_num_rows($result);

   if($count == 0){
       echo "No results found";
   }else{
        while($row = mysqli_fetch_array($result)){

            echo '
            <div class="card" style="width: 18rem; text-align: center;">
            <div class="card-body">
            <p>Name: '.$row['staff_name'].'</p>
            <p>Description: '.$row['description'].'</p>
            <a class="card-link" href = "viewDoc.php?id= '.$row['id'].'">View</a>
            </div>
            </div>
            ';

           
            

        }
   }
}


?>
</body>
</html>