<?php 
session_start();
        $hint = "";$products="";
        $conn = mysqli_connect('localhost', 'root', '', "winestore");
        if ($conn->connect_error) {
            die("Connection failed!" . $conn->connect_error);
        } else if(isset($_REQUEST["q"])){
            $q = $_REQUEST["q"];
            if ($q) {
$i=0;
                $q = strtolower($q);
                $len = strlen($q);

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if (stristr($q, substr($row['SKU DESC'], 0, $len))) {
                            if ($hint === "") {
                                $hint = $row['SKU DESC'] ;  $_SESSION['products'][$i]=$row['SKU ID'].'@'.$row['SKU DESC'];
                            } else {
                                $hint .= ", ". $row['SKU DESC']; $i=$i+1; $_SESSION['products'][$i]=$row['SKU ID'].'@'.$row['SKU DESC'];
                            }
                        }
                    }
                }
            }//echo " ".$hint;
    } 
 echo $hint === "" ? "no suggestion" : $hint; 

//echo $_SESSION['products'][0]; 
//print_r($_SESSION['products']); 

if(isset($_REQUEST['wine'])){
    $Q= $_REQUEST['wine'];
    echo "<br> search text ".$Q;
    $pID=0; 

$text =$_SESSION['products'][0];
$token = strtok($text,'@');echo "<br>id: ".$token;
$token1 = strtok('@'); echo "<br>name: ".$token1;
if(strcmp($Q,$token1)==0){
echo "ji";
 header("location:./product.php?pID=$token");
	die;
}
else {
header("location:./index.php");
	die;
}
}  
 
 ?> 