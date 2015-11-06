<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <style>

.section{
   width: 80%; height:auto;  margin-top: 10%;  margin-left: 5.2%;
   font-family: cursive; position:inherit;
}
 

</style>
      
 </head>
    <body>

<?php include './header.php';?>
</br>
        <div class="section">
<?php
$name="";$pwd="";
if (($_SERVER["REQUEST_METHOD"] == "POST") || isset($_POST["submit"])) {
$name = $_POST['name'];
$pwd = $_POST['pwd'];

//get mysql connection
$conn = mysqli_connect('localhost', 'root' ,'',"test1");
if($conn->connect_error){
	die("Connection failed!" .$conn->connect_error);
}
else{
   
   $sql = "select * from users where username='".$name."' and password='".$pwd."'";
   $result = $conn->query($sql);
 
   if($result->num_rows > 0){//sucess
     $row = $result->fetch_assoc();
    // session_start();
     $_SESSION['name']=$row["username"];
     echo '<h3>'.'Welcome: '.$row["username"].'</h3>';
     echo  '<p><a href =./logout.php>Signout</a></p>';
    
   }
   else{
       echo "Your details didnot match";
       echo  '<a href =./login.php>go back </a>';
       exit;
   }
}
}//if

?>  
<script>
function discount() {
 var x = Math.floor((Math.random() * 10) + 1);
document.getElementById("discount_display"). innerHTML = "your discount is "+x+"$";
document.getElementById("discount").style.visibility ="hidden";
}
</script>
<p id="discount"> For holiday discounts <a href="#" onclick= "discount()" > click here!</a></p>
<p id="discount_display"></p> 

</div>
<footer>
<?php include './footer.php';?>
</footer>
</body></html>