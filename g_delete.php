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

               $games_id=$_POST['games_id'];
		       $games_name="No Game found/Invalid ID";
               $games_year="NA";
               $season="NA";

             $query=mysqli_query($connect,"select * from games where games_id=$games_id ")or die("Error: " . mysqli_error($connect));
             if( mysqli_num_rows($query)){
                mysqli_query($connect,"delete from games where games_id=$games_id ");
                echo "Deleted!!!";
             }
             else{
                 echo "Game not found!!";
             }
    }
?>
<!DOCTYPE html>
<body>
<form name="BackDelete" method="post" action="games.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>