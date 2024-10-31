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
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
$to=$_POST["username"];
pg_connect("dbname=cryptodime_trek user=postgres");
$read=pg_query("select * from user_information;");
$flag=1;
while($row=pg_fetch_row($read))
{
if($row[2]!=$to)
{
   $flag=0;
 
}

if($row[2]==$to)
{
  $flag=1;
  break;
}

}
if($flag!=1)
{
echo "<h1 align=center>  Invalid Username</h1>";
echo "<button type=submit onclick=backtoUpdate() id=bl>Back To UpdatePassword</button>";

}
else
{


//Load Composer's autoloader
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'donotreplycryptodimetrek@gmail.com';                     //SMTP username
    $mail->Password   = 'hkbn ajse jyus jjza ';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

   
    $mail->setFrom('donotreplycryptodimetrek@gmail.com', 'CryptoDime Trek');
    $mail->addAddress($to, 'CryptoDime Treck');     //Add a recipient
  

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the  Your Reset Password Link From CryptoDime Trek :-> <b>http://localhost/Project/resetpassword.html</b>';
   

    $mail->send();
    echo "<h1 align=center> Message has been sent</h1>";
    echo "<button type=submit onclick=backtoLogin() id=bl>Back To Login</button>";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>

<script>
function backtoLogin()
{
 window.location.href="Login.html";
}
function backtoUpdate()
{
 window.location.href="updatePassword.html";
}


</script>
</body>
</html>

























