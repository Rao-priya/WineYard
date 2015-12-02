<!DOCTYPE html>

<html>
  <head>
    <title>Wine Chart</title>
    <link rel="stylesheet" type="text/css" href="../css/winestyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
  </head>
<body>
<p id ="top"></p>
 <?php session_start();  ?>
<header>
<?php include './header.php';?>
</header>
<div id="main">
  <div id="filter">
  <h2>Filter Products</h2>
<hr>
  <div>
      <h3>Type </h3>
  <input type="checkbox" id="option1" name="White" value="White" <?php if(isset($_POST['filterOpts']) && in_array("White",$_POST['filterOpts'])) echo 'checked';?>>
  <label for="option1">White</label>
  <input type="checkbox" id="option2" name="Red" <?php if(isset($_POST['filterOpts']) && in_array("Red",$_POST['filterOpts'])) echo 'checked';?>>
  <label for="option2">Red</label>
  </div>
<hr>
  <div>
    <h3>Price </h3>
  <input type="radio" id="price1" name="price" value="price1" <?php if(isset($_POST['filterOpts']) && in_array("price1",$_POST['filterOpts'])) echo 'checked';?>>
  under $25<br/>

  <input type="radio" id="price2" name="price" value="price2" <?php if(isset($_POST['filterOpts']) && in_array("price2",$_POST['filterOpts'])) echo 'checked';?>>
  $25 - $50<br/>
  <input type="radio" id="price3" name="price" value="price3" <?php if(isset($_POST['filterOpts']) && in_array("price3",$_POST['filterOpts'])) echo 'checked';?>>
  $50 and above<br/>
  </div>
</div>
<?php


//execute the SQL query and return records
  $conn = mysqli_connect('localhost', 'root' ,'',"winestore");
  if($conn->connect_error){
  	die("Connection failed!" .$conn->connect_error);
  }
  $sql = "SELECT * FROM `products` WHERE `PAIRING` LIKE 'Pasta'";

$where="";

$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');

if (in_array("White", $opts) && !in_array("Red", $opts)){
$where .= " AND TYPE = 'White'";
}
elseif (in_array("Red", $opts) && !in_array("White", $opts)){
$where .= " AND TYPE = 'Red'";
}
elseif (in_array("Red", $opts) && in_array("White", $opts)){
$where .= " AND( TYPE = 'Red' OR TYPE = 'White')";
}

if (in_array("price1", $opts) && !in_array("price2", $opts) && !in_array("price3", $opts)){
$where .= " AND PRICE BETWEEN 0 AND 25";
}
elseif (in_array("price2", $opts) && !in_array("price1", $opts) && !in_array("price3", $opts)){
$where .= " AND PRICE BETWEEN 25 AND 50";
}
elseif (in_array("price3", $opts) && !in_array("price1", $opts) && !in_array("price2", $opts)){
$where .= " AND PRICE BETWEEN 50 AND 100";
}

$sql = $sql . $where;

  $result = $conn->query($sql);
  //fetch tha data from the database
$list  = array();
while ($row = $result->fetch_assoc()) {
    $list[] =  $row['SKU DESC']."<br>".$row['REGION']."<br>".$row['ABV']."%"."<br>"."$"."&nbsp".$row['PRICE'];
    $SKU[] =  $row['SKU ID'];
    $SKUID =  $row['SKU ID'];
}


 if(count($list)>0)
 {
   $size = count($list); //Size of list for products shown
   $endTable = 0; //determines when to add footer



//create each table cell
function newCell($selections,$count,$ID) {//Added ID Parameter to get pictures
    $count = $count-1;
    $picNumber = $ID[$count]; //assifning picture name from array to string variable
    $pID=$picNumber;
?>
    <td>
    <p>
      <a id="details" href="./product.php?pID=<?=$pID?>">
          <img id="imgID" src="../img/Product/wine<?=$picNumber?>.jpg" alt="your wine">
    <BR>
      <div id="prodDetails">
      <?php

	  echo $selections[$count]; //Printing out wine information for tile

       ?>
     </div>
</a>
     <a href="pairing_pasta.php?page=pairing_pasta&action=add&id=<?php echo $pID ?>">
<button type="submit" form="form1" value="Submit">Add to Cart</button> </a>
    </p>
  </td>


<?php
}


//Code below is logic that arranges tiles
$epr = 3; //Elements per row (can be changed)
for($i = 1; $i<=$size ; $i++){//Cycles through all elements

      if($i==1){
?>
<div id="section">
        <table id="tlbData" align="center">
<?php
  }
      if((($i-1)%$epr)==0){// starts a row
?>
<tr>
    <?php
          newcell($list,$i,$SKU);
        }
            elseif (($i%$epr)==0) {//ends a row
                newcell($list,$i,$SKU);
  ?>
                </tr>
 <?php
        }
            elseif($i==$size){ //Ends table in case all elements are posted
                  newcell($list,$i,$SKU);
     ?>

                    </tr>
                    </table>

 <?php
                  $endTable=1;
        }
            else{//posts elements in between begining and end of rows
                    newcell($list,$i,$SKU);
        }
    }

   ?>
 <?php
  if($endTable==1){
    ?>
 <?php
    }

   ?>
</table>
<?php
   }
else
{
  ?>
  <div id=lblNoRecord>
    <p>No Records Found<p>
  </div>
  <?php
}
  ?>

</div>

</div>
<div>
<a href="#top" >
<img src="../img/top1.png" alt="back to top" width="80" height="80" style="margin-left:950px; position:relative;"/> </a>
</div>

   <?php
        if (isset($_GET['action']) && $_GET['action'] == "add") {

            //session_start();
            $id = intval($_GET['id']);

            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] ++;

            } else {
                $sql_s = "SELECT * FROM `products` WHERE `SKU ID` = $id";
                $result_s = $conn->query($sql_s);
                if ($result_s) {

                    $row_s = $result_s->fetch_assoc();
                    $_SESSION['cart'][$row_s['SKU ID']] = array(
                        "quantity" => 1,
                        "price" => $row_s['PRICE']);
		    if (count($_SESSION['cart'])) {//if set
                if (count($_SESSION['cart']) == 1) {
                    $ii = 1;
                    $_SESSION['product-cart'][$ii] = $row_s['SKU ID'];
                }
		else{
                $ii = count($_SESSION['product-cart']) + 1;

                $_SESSION['product-cart'][$ii] = $row_s['SKU ID'];
		}
               // echo "after -" . $ii;
            }

                }
            }
        }
        //print_r($_SESSION);
        ?>

        <script src="../js/filter_pasta.js"></script>
<footer>
<?php include './footer.php';?>
</footer>
</body>
</html>
