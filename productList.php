<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
       <?php 
	session_start();
 ?> 
 <?php include './header.php';?>
</br>
        <div class="section">

            <h1>Product List</h1> 
            <table> 
                <tr> 
                    <th>Product ID</th>
                    <th>Name</th> 
                    <th>Type</th>
                    <th>Country</th>
                    <th>Price</th> 

                </tr> 
               
      
                <?php
                $conn = mysqli_connect('localhost', 'root', '', "test1");
                if ($conn->connect_error) {
                    die("Connection failed!" . $conn->connect_error);
                } else {
                    $type = "White";
                    $country = "USA";
                    $sql = "SELECT * FROM products where TYPE='" . $type . "'and Country= '" . $country . "'";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            ?>
                            <tr> 
                                <td><?php echo $row['SKU ID'] ?></td> 
                                <td><?php echo $row['SKU DESC'] ?></td> 
                                <td><?php echo $row['TYPE'] ?></td> 
                                <td><?php echo $row['COUNTRY'] ?></td> 
                                <td><?php echo $row['PRICE'] ?></td> 

                                <td><a href="product.php?page=product&action=add&id=<?php echo $row['SKU ID'] ?>  onclick="display()">Add to cart</a></td> 
                            </tr> 
                            <?php
                        }
                    }
                }

                ?>  


            </table>
        </div>
<br>
  <?php

        if (isset($_GET['action']) && $_GET['action'] == "add") {
	
         //session_start();
            $id = intval($_GET['id']);
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]['quantity'] ++;
            } else {
                $sql_s = "SELECT * FROM products WHERE SKU_ID='".$id."'";

                $result_s = $conn->query($sql_s);
                if ($result_s) {
                    $row_s = $result_s->fetch_assoc();
                    $_SESSION['cart'][$row_s['SKU_ID']] = array(
                        "quantity" => 1,
                        "price" => $row_s['PRICE']);

		 
                }
            }
        }
  if (isset($_SESSION['cart'])) {
print_r($_SESSION);echo count($_SESSION['cart']);}
else{
echo "not";
}
    ?> 
        <footer >
<?php include './footer.php'; ?>
        </footer>
    </body>
</html>
