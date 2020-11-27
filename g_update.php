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
    $games_name = $_POST['games_name'];
    $games_year=$_POST['games_year'];
    $season= $_POST['season'];

    $query=mysqli_query($connect,"select * from games where games_id=$games_id ")or die("Error1: " . mysqli_error($connect));
    while($row=mysqli_fetch_array($query))
             {
                $games_id=$row['games_id'];
                if(!$games_name)
                    $games_name=$row['games_name'];
                if(!$games_year)
                    $games_year=$row['games_year'];
                if(!$season)
                    $season=$row['season'];
             }
    if( mysqli_num_rows($query)){

        mysqli_query($connect,"update games set games_name='$games_name', games_year=$games_year, season='$season' where games_id=$games_id ")or die("Error2: " . mysqli_error($connect));
        echo "Updated!!!";
     }
     else{
         echo "Game not found!!";
     }


    // Close the database connection
    $connect->close();
 }
?>
<!DOCTYPE html>
<body>
<form name="BackUpdate" method="post" action="games.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>