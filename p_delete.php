<?php
    if(isset($_POST['Submit']))
    {
        $connect=mysqli_connect('localhost','root','','olympic_game');
        $insert=False;
        if(mysqli_connect_errno($connect))
        {
            echo 'Failed to connect to database: '.mysqli_connect_error();
        }
        else
            echo 'Connected Successfully!!';

            $person_id=$_POST['person_id'];
            $full_name="No Player found/Invalid ID";
            $height=0.00;
            $weight=0.00;
            $gender="NA";

             $query=mysqli_query($connect,"select * from person where person_id=$person_id ")or die("Error: " . mysqli_error($connect));
             //echo "Returned rows are: " . mysqli_num_rows($query);
             if( mysqli_num_rows($query)){
                mysqli_query($connect,"delete from person where person_id=$person_id ")or die("Error: " . mysqli_error($connect));
                echo "Deleted!!!";
             }
             else{
                 echo "Person not found!!";
             }
    }
?>
<!DOCTYPE html>
<body>
<form name="BackDelete" method="post" action="person.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>