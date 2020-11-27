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
             while($row=mysqli_fetch_array($query))
             {
               $person_id=$row['person_id'];
               $full_name=$row['full_name'];
               $height=$row['height'];
               $weight=$row['weight'];
               $gender=$row['gender'];
             }
      }
      if(!$full_name)
        $full_name="NULL";
      if(!$height)
        $height='NULL';
      if(!$weight)
        $weight='NULL';
      if(!$gender)
        $gender='NULL';
         if(isset($_POST['Submit']))
         {
          echo "<div id='page-wrap'>
          <div id='contact-info' class='vcard'>
          
              <!-- Microformats! -->
             
              <h1 class='fn'>
              </h1>
              <p>
                  ID: <span >$person_id</span><br />
                  Height:<span >$height</span><br />
                  Weight:<span >$weight</span><br />
                  Gender:<span>$gender</span>
              </p>
          </div>";
        
         }
?>
<!DOCTYPE html>
<body>
<form name="BackSearch" method="post" action="person.html">
      <input type="submit" name="Back to form" id="Back to form" value="Back to form">
</form>
</body>
</html>