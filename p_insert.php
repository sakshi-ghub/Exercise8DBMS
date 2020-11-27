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

    
    $person_id = $_POST['person_id'];
    $full_name = $_POST['full_name'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $gender= $_POST['gender'];
    $sql = "INSERT INTO `olympic_game`.`person` (`person_id`, `full_name`, `height`, `weight`, `gender`)     
    VALUES ('$person_id', '$full_name', '$height', '$weight', '$gender' );";
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
<form name="BackInsert" method="post" action="person.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>