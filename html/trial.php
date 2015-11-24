<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/product.css"  rel="stylesheet">
      <script src="//code.jquery.com/jquery-1.10.2.js"></script>
      <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    </head>
    <body>

      <header>
      <?php include './header.php';?>

      </header>
</br>


<?php

if(isset($_GET['pID'])){
//clean it up
/*
if(!is_numeric($_GET['pID'])){
//Non numeric value entered. Someone tampered with the pid
$error=true;
$errormsg=" No product with this ID exist";
}
else{*/
$pname= $_GET['pID'];
echo $pname;
$conn = mysqli_connect('localhost', 'root' ,'',"winestore");
if($conn->connect_error){
	die("Connection failed!" .$conn->connect_error);
}
else{
   $pID = $_GET['pID'];
   $sql = "SELECT * FROM `products` WHERE `SKU ID` = $pID";
   $result = $conn->query($sql);
   if($result->num_rows > 0){//sucess
     $row = $result->fetch_assoc();
      $prodID = $row['SKU ID'];
      $prodName=$row['SKU DESC'];
      $prodRegion=$row['REGION'];
      $alcoPercent=$row['ABV'];
      $import=$row['NAT/IMP'];
      $country=$row['COUNTRY'];
      $pairing=$row['PAIRING'];
      $price=$row['PRICE'];
      $type = $row['TYPE'];
?>


<div id="main">
              <div id="prodImg">
                  <img id="imgID" src="../img/wine<?=$prodID?>.jpg" alt="your wine">
              </div>
                <div id="prodInfo">
                <p id="prodName"><?=$prodName?></p>
                <p id="prodRegion"><span>Region: </span><?=$prodRegion?></p>
                <p id="prodCountry"><span>Country: </span><?=$country?></p>
                <?php
                if($type=="White")
                {?>
                <p id="alcoPercent"><img id="imgType" src="../img/WhiteWineIcon.png" alt="White Wine"/><?=$alcoPercent?>% &amp; abv</p>

                <?php
              }
                elseif($type=="Red")
                {?>
                <p id="alcoPercent"><img src="../img/RedWineIcon.png" alt="Red Wine"/><?=$alcoPercent?>% &amp; abv</p>
                <?php
              }
                ?>
                <p id="review"><span class="review">3 comments</span><img id="rvImg" class="img" style="padding-top:10px; height:20px; width:60px;"  src="../img/review-three-half-stars.jpg" /></p>
                </div>


<div id="cartForm">
           <form method="post" enctype="multipart/form-data" action=#> 
              <table>
                <tr>
                  <td>
            <label for="prodID">SKU ID: </label></td><td><label for="prodID" value=""><?=$prodID?></label></td></tr>
                <tr>
                  <td>
            <label for="price">Price: </label></td><td><label for="price" value=""><?=$price?></label></td></tr>
            <tr>
              <td>
            <label for="qty">Qty: </label></td><td> <input type="text" size="2" name="qty" value="1"/></td></tr>
            <tr>
              <td>
                  <input name="id" type="hidden" value="<?=$prodID?>">    
                  
                        
                
           </td></tr>

          </table>
           </form>
</div>


            <div class="container">

            <ul class="tabs">
            <li class="tab-link current" data-tab="tab-1">About the Wine</li>
            <li class="tab-link" data-tab="tab-2">Shipping</li>
            <li class="tab-link" data-tab="tab-3">Review</li>
            </ul>

            <div id="tab-1" class="tab-content current">
              <label for="import">This Wine is: </label><label for="price"><?=$import?></label>
              <br/>
              <br/>
              <label for="pairing">Goes with Pairing: </label><label for="pairing"><?=$pairing?></label>
              <br/>
              <br/>
              <label for="region">Comes from region: </label><label for="region"><?=$prodRegion?></label>

            </div>
            <div id="tab-2" class="tab-content">

            </div>
            <div id="tab-3" class="tab-content">
  <p id="review"><span class="review">3 comments</span><img id="rvImg" class="img" style="padding-top:10px; height:20px; width:60px;"  src="../img/review-three-half-stars.jpg" /></p>
</div>
            </div>
            <!-- container -->

<?php
}
   // }
    }
    }

  $var = $type;
  include("relatedProduct.php");
?>
</div>

<footer>
<?php include './footer.php';?>
</footer>
  <script src="../js/product.js"></script>
    </body>
</html>
