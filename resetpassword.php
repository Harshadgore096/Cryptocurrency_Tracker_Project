
<html>
<head>
<style>
 body{
      background-color: black;
     }
h1{
margin-top:60px;
 color:gold;
 font-weight:bolder;
 font-size:60px;
 border:3px solid;
 
}
#bl{

margin-left:600px;
height:80px;
background-color:aqua;

}
</style>

</head>
<body>
<?php
$username=$_POST["username"];
$password=$_POST["password"];
pg_connect("dbname=cryptodime_trek user=postgres");
$read=pg_query("select * from user_information");
$flag=1;
while($row=pg_fetch_row($read))
{
if($row[2]!=$username && $row[3]!=$password)
{
   $flag=0;
 
}
 if($row[2]==$username && $row[3]!=$password)
{

 $flag=0;
}

if($row[2]==$username && $row[3]==$password)
{
  $flag=1;
}

}
if($flag!=1)
{
 
echo "<h1 align=center> Invalid UserName Or Password </h1>";
echo "<button type=submit onclick=backtoLogin() id=bl>Back To Login</button>";

}
else
{
header("Location:./main/index.html");
}
?>
<script>

function backtoLogin()
{
 window.location.href="Login.html";
}
</script>
</body>
</head>

