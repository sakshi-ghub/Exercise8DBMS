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

    $query=mysqli_query($connect,"select * from person where person_id=$person_id ")or die("Error1: " . mysqli_error($connect));
    while($row=mysqli_fetch_array($query))
             {
                $person_id=$row['person_id'];
                if(!$full_name)
                    $full_name=$row['full_name'];
                if(!$height)
                    $height=$row['height'];
                if(!$weight)
                    $weight=$row['weight'];
                if(!$gender)
                    $gender=$row['gender'];
             }
    if( mysqli_num_rows($query)){

        mysqli_query($connect,"update person set full_name='$full_name', height=$height, weight=$weight, gender='$gender' where person_id=$person_id ")or die("Error2: " . mysqli_error($connect));
        echo "Updated!!!";
     }
     else{
         echo "Person not found!!";
     }


    // Close the database connection
    $connect->close();
 }
?>
<!DOCTYPE html>
<body>
<form name="BackUpdate" method="post" action="person.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>