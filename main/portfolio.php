<html>
<head>
<style>
 body{
      background-color: black;
     }
h1{
 margin-top:80px;
 color:gold;
 font-weight:bolder;
 font-size:60px;
 border:3px solid;
 
}

#bi{
margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
height:80px;
background-color:aqua;
color:black;

}

</style>

</head>
<body>

<?php
session_start();
$coinId = $_GET['id'];
if (isset($_SESSION['username'])) {
    if (isset($_GET['id'])) {
    $Quantity=$_GET['quantity'];
    $user=$_SESSION['username'];
    echo $coinId,$Quantity;
   pg_connect("dbname=cryptodime_trek user=postgres");
   
   if(pg_query("insert into user_portfolio values('$user','$coinId',$Quantity);"))
   {
   
   echo "<h1 align=center> $coinId Is Added To Your PortFolio !!!</h1>";   
   echo "<button type=submit onclick=backtoindex() id=bi align=center> ...Ok...</button>";

   }
   else
   {

 echo "<h1 align=center> $coinId Is Already In To  PortFolio !!!</h1>";   
 echo "<button type=submit onclick=backtoindex() id=bi>Back To Home Page</button>";
   }
}
}


?>
<script>
function backtoindex()
{
window.location.href="index.php";

}
</script>
</body>
</html>

