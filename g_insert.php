<?php
 if(isset($_POST['Submit']))
 {

 $connect=mysqli_connect('localhost','root','','olympic_game');
  $insert=false;
 //check connection
  if(mysqli_connect_errno($connect))
  {
     echo 'Failed to connect to database: '.mysqli_connect_error();
 }
 else
     echo 'Connected Successfully!!';

    
    $games_id = $_POST['games_id'];
    $games_year = $_POST['games_year'];
    $games_name=$_POST['games_name'];
    $season=$_POST['season'];
    $sql = "INSERT INTO `olympic_game`.`games` (`games_id`, `games_year`, `games_name`, `season`)     
    VALUES ('$games_id', '$games_year', '$games_name', '$season' );";
    // echo $sql;

    //Execute the query
    if($connect->query($sql) == true){
        echo "Successfully inserted!!";
        echo "Check your database for confirmation!!";

        // Flag for successful insertion
        $insert = true;
        $result='<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Form</strong> Suceesfully submitted.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    else{
        echo "ERROR: $sql <br> $connect->error";
    }

    // Close the database connection
    $connect->close();
 }
?>
<!DOCTYPE html>
<body>
<form name="BackInsert" method="post" action="games.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>