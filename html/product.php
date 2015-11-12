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

         <?php include './header.php';?>
</br>


<?php

if(isset($_GET['pID'])){
//clean it up
if(!is_numeric($_GET['pID'])){
//Non numeric value entered. Someone tampered with the pid
$error=true;
$errormsg=" No product with this ID exist";
}
else{
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
?>


<div id="main">
                <div id="prodImg">
                <img id="icImg" class="img" src="../img/s-l300.jpg" />
              </div>
                <div id="prodInfo">
                <p id="prodName"><?=$prodName?></p>
                <p id="prodRegion"><span>Region: </span><?=$prodRegion?></p>
                <p id="prodCountry"><span>Country: </span><?=$country?></p>
                <p id="alcoPercent"><img src="../img/wineIcon.png"/><?=$alcoPercent?>% &amp; abv</p>
                <p id="review"><span class="review">3 comments</span><img id="rvImg" class="img" style="padding-top:10px; height:20px; width:60px;"  src="../img/review-three-half-stars.jpg" /></p>
                </div>


<div id="cartForm">
            <form method="post" enctype="multipart/form-data" action="testcart.php">
              <table>
                <tr>
                  <td>
            <label for="prodID">SKU ID: </label></td><td><label for="prodID" value=""><?=$prodID?></label></td></tr>
                <tr>
                  <td>
            <label for="price">Price: </label></td><td><label for="price" value=""><?=$price?></label></td></tr>
            <tr>
              <td>
            <label for="qty">Qty: </label></td><td> <input type="text" size="4" name="qty" value="1"/></td></tr>
            <tr>
              <td>
                  <input name="id" type="hidden" value="<?=$prodID?>">
            <input type="submit" value="Add To Cart" class="addtocartBtn"></td></tr>

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
    }
    }
    }
       ?>

            <?php

            include("relatedProduct.php");

            ?>
</div>

       <footer>
<?php include './footer.php';?>
</footer>
  <script src="../js/product.js"></script>
    </body>
</html>
