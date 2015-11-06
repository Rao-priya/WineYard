<?php
$s = "localhost:3306";
$u = "root";
$p = "your_password";



$conn = mysqli_connect('localhost', 'root' ,'',"test1");
if($conn->connect_error){
	die("Connection failed!" .$conn->connect_error);
}
else {
echo "connected yay!!";
$sql = "SELECT * from users";
$res = $conn->query($sql);
if($res->num_rows > 0){
while($row = $res->fetch_assoc()) {
	echo "id:" .$row["userid"]. " -name:" .$row["username"]. "<br>";
  }//while
}//if
else{
echo "0- results";
}
}
?>