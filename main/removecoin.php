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

margin: 0;
  position: absolute;
  top: 50%;
  left: 50%;
height:80px;
background-color:aqua;

}

</style>
</head>
<body>

<?php

        session_start();
        $user = $_SESSION["username"];
        
        $coinid=$_GET["id"];
        
        if(isset($_GET["id"])){ 
        pg_connect("dbname=cryptodime_trek user=postgres");
        pg_query("delete from user_portfolio where user_name='$user' and crypto_id='$coinid';");
        echo "<h1 align=center> $coinid Removed From Portfolio</h1>";
             echo "<button type=submit onclick=backtoportfolio() id=rb>Back To PortFolio</button>";
       }
       else
       {
       
               echo "<h1 align=center> $coinid Cannot be  Removed From Portfolio</h1>";
                    echo "<button type=submit onclick=backtoportfolio() id=rb>Back To PortFolio</button>";
       
      }


?>
<script>
 function backtoportfolio(){
 
 window.location.href="ViewPortFolio.php";
 
 }

</script>
</body>
</html>

