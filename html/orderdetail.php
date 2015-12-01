<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link href="../css/orderhistory.css"  rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    </head>
    <body>

 <div class="section">

<div class="slide-container">

                <table >

                    <tr>
                        <th>Order ID</th>
                        <th>Product Info</th>
                        <th>Total Quantity</th>
                        <th>Total Price</th>
                    </tr>
<?php

			$name =  $_SESSION['name'];//$row["username"];
                        $conn = mysqli_connect('localhost', 'root', '', 'winestore');
                        if ($conn->connect_error) {
                            die("Connection failed!" . $conn->connect_error);
                        } else {

                            $sql = "SELECT * FROM `transaction` WHERE `username` = '$name'";

                            $result = $conn->query($sql);
                            if ($result) {

                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tr>
                                      <td><?php echo $row['transactionID'] ?></td>

                                    <td class="prodInfo">


                                      <?php
$productIDs =$row['productID'];
                                      $sqlP = "SELECT * FROM `products` WHERE `SKU ID` IN ($productIDs)";


                                      $resultP = $conn->query($sqlP);
                                      if ($resultP) {

                                          while ($rowP = $resultP->fetch_assoc()) {
                                              ?>

        -  <?php echo $rowP['SKU DESC'] ?>
<br>

    <?php
}
}
?>

  </td>
                                      <td><?php echo $row['quantity'] ?></td>
                                        <td><?php echo $row['totalprice'] ?></td>

                                    </tr>
                                    <?php
                                }
                            }
                        }

                        ?>

                    </table>

                    </div>
                    </div>
    </body></html>
