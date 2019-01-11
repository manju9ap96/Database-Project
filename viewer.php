<?php
    session_start();
    if(isset($_SESSION['userid']))
        {
            ?>
<html>
<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100"><link rel="stylesheet" type="text/css" href="table.css">
<link href="owner.css" rel="StyleSheet">
<title>Hello Viewer</title>
<body style="background : url(http://cdn.wallpapersafari.com/9/0/7zGnLk.jpg);background-repeat: no-repeat;background-size: 1100px 520px">
  
<ul>
       <li><a href="">Home</a></li>
       <li><a href="">Houses</a>
     
     <ul><li><a href="viewhouseo.php">View Houses</a></li>

       </ul></li>
       <li><a href="">Shops<ul>
       <li><a href=" viewshopte.php">View Shops</a></li>
      

       </ul></a></li>
       <li><a href="" >Lands</a>
         <ul>
       
               <li><a href="viewlandte.php">View Lands</a></li>

 
      </ul></li>
      <li><a href="logout.php">Logout</a></li>
     
</ul>
</html>
</body>
     </html>
     <?php
     }
     else
     {
      header("Location: login.php");
     }
     ?>