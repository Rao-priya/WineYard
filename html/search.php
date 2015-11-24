<?php
        $hint = "";
        $conn = mysqli_connect('localhost', 'root', '', "winestore");
        if ($conn->connect_error) {
            die("Connection failed!" . $conn->connect_error);
        } else if(isset($_REQUEST["q"])){
            $q = $_REQUEST["q"];
            if ($q) {
                $q = strtolower($q);
                $len = strlen($q);

                $sql = "SELECT * FROM products";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        if (stristr($q, substr($row['SKU DESC'], 0, $len))) {
                            if ($hint === "") {
                                $hint = $row['SKU DESC'] ;
                            } else {
                                $hint .= ", ". $row['SKU DESC'];
                            }
                        }
                    }
                }
            }echo " ".$hint;
      echo $hint === "" ? "no suggestion" : $hint;  }
else{//
/*if(isset($_REQUEST['wine'])){
    $Q= $_REQUEST['wine'];
    echo $Q;
    $pID=0;   
     
   // SELECT * FROM `products` WHERE `SKU DESC` = "Poet's Leap Riesling 2014"
//`PAIRING` LIKE 'BEEF'
     $sql = "SELECT SKU ID FROM `products` WHERE `SKU DESC` = 'Poet's Leap Riesling 2014'";
     $result = $conn->query($sql);
     if ($result) {
         $pID=$row['SKU ID'];
		 echo "X".$Q; 
                echo $pID;
       //  header("location:./product.php?pID=<?=$pID?>");
	//die;
     }
    }*/
}

 ?>