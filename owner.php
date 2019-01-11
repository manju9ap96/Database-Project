<?php
  session_start();
  if(isset($_SESSION['userid']))
    {
      ?>
<html>
<head>
<style >
  .menu ul{
    list-style: none;
    margin: 0px;
  }
  .menu ul li{
    list-style: none;
    padding: 30px;
    position: relative;
    width: 200px;
    color:white;
    font-size: 30px;
    background-color:#34495E;
    border-top: 1px solid #BDC3C7
    margin-bottom:2px;
  }ul li a{
  text-decoration:none;
  color: white;
  display: block;
  

}
ul li a:hover{
background-color:green;
font-style: italic;
font-color:black;

}
ul li ul li{
  display: none;
}
ul li:hover ul li{
  display: block;
  font-size: 20px;
  font-color:black;
}
</style>
</head>
<link rel="icon" href="icon.jpg" type="image/gif" sizes="30x100">
<link href="" rel="StyleSheet">

<title>Home</title>
<body style="background : url(http://cdn.wallpapersafari.com/9/0/7zGnLk.jpg);background-repeat: no-repeat;background-size: 1100px 520px">

  <div class="menu">
<ul>
       <li><a href="">Home</a>
        
       <ul> 
       <li><a href="viewpro1.php">My profile</a></li>
       <li><a href=" tenantview.php">Tenants</a></li>

      <li><a href="requestowner.php">Requests</a></li>
  
    </ul></li>
       <li><a href="">Houses</a>
     
     <ul>
      <li><a href="viewhouse.php">View Houses</a></li>
        <li><a href="addhouse.php">Rent a House</a>
        </li>
<li><a href="sellhouse.php"> Sell House</li>
       </ul></li>
       <li><a href="">Shops<ul>
       <li><a href="viewshop.php">View Shops</a></li>
                <li><a href="addshop.php">Add Shops</a></li>

       </ul></a></li>
       <li><a href="" >Lands</a>
         <ul>
       
               <li><a href="viewland.php">View Lands</a></li>
                <li><a href="addlands.php">Add lands</a></li>

 
      </ul></li>
      <li><a href="logout.php">Logout</a></li>
    </div>
     
</ul>
</html>
<?php
     }
     else
     {
      header("Location: login.php");
     }
     ?>