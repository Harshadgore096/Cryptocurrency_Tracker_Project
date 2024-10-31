
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
$read=pg_query("select * from user_information;");
$flag=1;
while($row=pg_fetch_row($read))
{
if($row[2]!=$username)
{
   $flag=0;
 
}

if($row[2]==$username)
{
  $flag=1;
}

}
if($flag!=1)
{
 
echo "<h1 align=center> Invalid UserName</h1>";
echo "<button type=submit onclick=backtoreset() id=bl>Back To Login</button>";

}
else
{
 pg_query("update user_information set password='$password' where email_id='$username';");
 echo " <h1 align=center>Password Update Succefully </h1>"; 
 echo "<button type=submit onclick=backtoLogin() id=bl>Back To Login</button>";
}
?>
<script>

function backtoreset()
{
 window.location.href="resetpassword.html";
}

function backtoLogin()
{
 window.location.href="Login.html";
}
</script>
</body>
</head>

