<?php
$s = "localhost:3306";
$u = "root";
$p = "your_password";



$conn = mysqli_connect('localhost', 'root' ,'',"test1");//get connection
if($conn->connect_error){//if error in connecting exit
	die("Connection failed!" .$conn->connect_error);
}
else { ///
echo "connected yay!!";
$sql = "SELECT * from users";//users is table name here
$res = $conn->query($sql);//res is result of your query
if($res->num_rows > 0){//res->num of row gives you count of 
while($row = $res->fetch_assoc()) {
	echo "id:" .$row["userid"]. " -name:" .$row["username"]. "<br>";//products country, region,
  }//while
}//if
else{
echo "0- results";
}
}
?>