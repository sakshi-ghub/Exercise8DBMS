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
             while($row=mysqli_fetch_array($query))
             {
                $games_id=$_POST['games_id'];
                $games_name=$row['games_name'];
                $games_year=$row['games_year'];
                $season=$row['season'];
             }
           }
            if(!$games_name)
                $games_name="NULL";
            if(!$season)
                $season="NULL";
            if($games_year==0000)
                $games_year="NULL";
         if(isset($_POST['Submit']))
         {
          echo "<div id='page-wrap'>
          <div id='contact-info' class='vcard'>
          
              <!-- Microformats! -->
             
              <h1 class='fn'>
              </h1>
              <p>
                    ID: <span >$games_id</span><br />
                    Name:<span >$games_name</span><br />
                    Year:<span >$games_year</span><br />
                    Season:<span>$season</span>
              </p>
          </div>";
        
         }
?>
<!DOCTYPE html>
<body>
<form name="BackSearch" method="post" action="games.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>