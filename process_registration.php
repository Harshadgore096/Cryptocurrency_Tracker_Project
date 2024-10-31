<html>
<head>
<style>
 body{
      background-color: black;
     }
h1{
 color:gold;
 font-weight:bolder;
 font-size:60px;
 border:3px solid;
 
}
h5{
color:gold;
font-weight:bolder;
font-size:20px;
}

#sb{
margin-left:500px;
height:80px;
background-color:green;

}

#rb{

margin-left:500px;
height:80px;
background-color:aqua;

}

#rb1{

margin-left:800px;
height:80px;
background-color:aqua;

}


</style>
</head>
<body>
<?php

$first_name=$_POST["firstName"];
$last_name=$_POST["lastName"];
$email_id=$_POST["email"];
$mobile_no=$_POST["mobile"];
$password=$_POST["password"];

 pg_connect("dbname=cryptodime_trek user=postgres");

if( pg_query("insert into user_information values('$first_name','$last_name','$email_id','$password','$mobile_no');"))
{
 echo "<h1 align=center> Registration Succesful </h1>"; 

       echo "<button type=submit onclick=backtoregister() id=rb>Back To Registration</button>";
         echo" <button type=submit  onclick=ProceedToLogin()  id=sb>Proceed To Login</button>";

               echo "<h5 align=center> Thank You for Registring On Platform </h5>";
}
 else
 {
 
   echo "<h1 align=center>Sorry ! Email is alreday linked with Another User</h1>"; 
     echo "<button type=submit onclick=backtoregister() id=rb1>Back To Registration</button>";
 }
  

?>
  
  <script>
  function ProceedToLogin()
  {
  
  window.location.href="Login.html";
  
  }
  function backtoregister()
  {
  
  window.location.href="register.html";
  }
  
  </script>
</body>
