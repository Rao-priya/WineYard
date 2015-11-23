<!DOCTYPE html>

<html>
  <head>
    <title>Wine Chart</title>
    <link rel="stylesheet" type="text/css" href="../css/winestyle.css">
<script src="http://code.jquery.com/jquery-latest.js"></script>
  </head>
<body>
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
  $sql = "SELECT * FROM `products` WHERE `NAT/IMP` LIKE 'Imported'";

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
<a href="./product.php?pID=<?=$pID?>">
    <img id="imgID" src="../img/wine<?=$picNumber?>.jpg" alt="your wine">
    <BR>
      <div id="prodDetails">
      <?php

	  echo $selections[$count]; //Printing out wine information for tile

       ?>
     </div>
</a>
    <button type="submit" form="form1" value="Submit">Add to Cart</button> <!--Add to Cart Button!!!!!!! Currently does not do anything  -->
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
  echo("No Records Found");
}
  ?>

</div>

</div>
<script>

function updateprods(opts){
  $.ajax({
  type: "POST",
  url: "imported_wine.php",
  dataType : 'html',
  cache: false,
  data: {filterOpts: opts},
  success: function(data){
       $("html").html(data);
  }
  });
  }

var $checkboxes = $("input:checkbox");
$checkboxes.on("change", function(){
var opts = getprodFilterOptions();

updateprods(opts);
});

var $radioButton = $("input:radio");          // check radio button is clicked
$radioButton.on("change", function(){
var opts = getprodFilterOptions();    // update the database

updateprods(opts);
});

function getprodFilterOptions(){
var opts = [];
//var checkboxValues = {};
$checkboxes.each(function(){
if(this.checked){
opts.push(this.name);

}
});

$radioButton.each(function(){
if(this.checked){
opts.push(this.value);
}
});
return opts;
}

</script>

<footer>
<?php include './footer.php';?>
</footer>
</body>
</html>