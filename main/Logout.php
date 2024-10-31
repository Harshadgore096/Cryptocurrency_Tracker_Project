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


#lb{
margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
height:80px;
width:100px;
background-color:green;
color:black;

}
</style>

</head>
<body>
<?php

 session_start();
 $username=$_SESSION["username"];
 echo "<h1 align=center> Hi !! $username Your Account has LogOut Succesfully.....</h1>";
 


?>

<button type=submit onclick=Logout() id=lb>OK</button>

<script>


function Logout()
{
 window.location.href="../LoginPage.html";
 <?php
  session_destroy();
 ?>
}

</script>
</body>
</html>
