<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Winery</title>
        <link href="../css/relatedProduct.css"  rel="stylesheet">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
</head>
<body>

  <?php

  //execute the SQL query and return records
    $conn = mysqli_connect('localhost', 'root' ,'',"winestore");
    if($conn->connect_error){
     die("Connection failed!" .$conn->connect_error);
    }

    $sql = "SELECT * FROM `products` WHERE `TYPE` LIKE '$type'";
    $result = $conn->query($sql);
    //fetch tha data from the database
    ?>
    <h2>Featured Products</h2>
  <div id="scroller">
     <div class="innerScrollArea">
         <ul>
           <?php
           foreach($result as $pro) {
             $prodID = $pro['SKU ID'];
             $prodName=$pro['SKU DESC'];
             ?>
             <li>
   <a href="./product.php?pID=<?=$prodID?>">
     <img class="imgID" src="../img/Product/wine<?=$prodID?>.jpg" alt="your wine">
   </a>

     <a href="#"><span class="productname"><?=$prodName?></span></a>

     <button class="cartBtn"  type="submit" form="form1" value="Submit">Add to Cart</button> <!--Add to Cart Button!!!!!!! Currently does not do anything  -->
   </li>
   <?php
   }

   ?>
         </ul>
     </div>
 </div>
<script src="../js/relatedProduct.js"></script>
</body>
</html>
