<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    
</head>
    <body>

<?php include './header.php';?>
</br>
        <div class="section">

<style type="text/css">

.section{
   width: 80%; height:auto;  margin-top: 10%;  margin-left: 5.2%;
   font-family: cursive; position:inherit;
}
 

 input{
 border:1px solid olive;
 border-radius:5px;
 }
 h1{
  color:darkred;
  font-size:22px;
  text-align:center;
 }
</style>
</head>
<body>
<h1>Forgot Password<h1>
<form action='#' method='post'>
<table cellspacing='5' align='center'>
<tr><td>Email id:</td><td><input type='text' name='mail' required/></td></tr>
<tr><td></td><td><input type='submit' name='submit' value='Submit'/></td></tr>
</table>
</form>
<?php
if(isset($_POST['submit']))
{ 
    $conn = mysqli_connect('localhost', 'root' ,'',"test1");
    if($conn->connect_error){
	die("Connection failed!" .$conn->connect_error);
}
else{
    $mail = $_POST['mail'];
    $sql = "select * from users where email='".$mail."'";
    $result = $conn->query($sql);  
    if($result->num_rows > 0){//sucess
         $row = $result->fetch_assoc();
         $to = $row['email'];
         $subject = "password remind";
         $message = "Your password: " .$row['password'];
         $header = 'From:priyankanadagoud@gmail.com';
         $m = mail($to,$subject,$message,$header);
         if($m){
             echo 'check your mail'.'</br>';
         }else{
             echo 'mail not sent'.'<br>';
         }       
   }
   else{
       echo "Your email id is not present in database".'</br>';
   }
}
}
?>
</div>
<footer>
<?php include './footer.php';?>
</footer>
        </body>
        </html>