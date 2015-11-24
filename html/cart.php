<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 	<link href="../css/cart_css.css"  rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	 <script language="javascript" type="text/javascript">
function reload_billing() 
{
    window.location.href = "../html/billing_info.php";
}

</script>
    </head>
    <body>
<?php
  session_start();
?>
<?php include './header.php'; ?>
</br>
       
 <div class="section">
<div id="wrapper">
<div class="slide-container">
     
  <?php 
  
    if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
      if(count($_SESSION['cart']) == 0){
//last item so unset session ofcart
unset($_SESSION['cart']); 
		session_destroy();
	}    
    } 
  
?> 
 

                    <?php
                  
                    if (isset($_SESSION['cart'])) {


?>


<h1>View cart</h1> 
            <form method="post" > 

                <table > 

                    <tr> 
                        <th>Name</th> 
                        <th>Quantity</th> 
                        <th>Price</th> 
                        <th>Items Price</th> 
                    </tr> 
<?php

                        
                        $conn = mysqli_connect('localhost', 'root', '', 'winestore');
                        if ($conn->connect_error) {
                            die("Connection failed!" . $conn->connect_error);
                        } else {
			     $totalprice = 0;
                            $sql = "SELECT * FROM `products` WHERE `SKU ID` IN (";

                            foreach ($_SESSION['cart'] as $id => $value) {
                                $sql.=$id . ",";
                            }

                            $sql = substr($sql, 0, -1) . ") ORDER BY `SKU DESC` ASC";

                            $result = $conn->query($sql);
                            if ($result) {

                                $totalprice = 0;
                                while ($row = $result->fetch_assoc()) {

                                    $subtotal = $_SESSION['cart'][$row['SKU ID']]['quantity'] * $row['PRICE'];
                                    $totalprice+=$subtotal;
                                    ?> 
                                    <tr> 
                                        <td><?php echo $row['SKU DESC'] ?></td> 
                                        <td><input type="text" name="quantity[<?php echo $row['SKU ID'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['SKU ID']]['quantity'] ?>" /></td> 
                                        <td><?php echo $row['PRICE'] ?>$</td> 
                                        <td><?php echo $_SESSION['cart'][$row['SKU ID']]['quantity'] * $row['PRICE'] ?>$</td> 
                                    </tr> 
                                    <?php
                                }
                            }
                        }
                        ?> 
                        <tr> 
                            <td colspan="4">Total Price: <?php echo $totalprice ?></td> 
                        </tr> 
                   

                    </table> 
                    <br /> 
                    <button type="submit" name="submit">Update Cart</button> 
                </form> 
<p>To remove an item set its quantity to 0. </p>
 <?php } 
 else {?>
            <p> Shopping cart is empty.</p>
<div class="button"><a href= "../html/country_wine.php" class="abutton"> Continue Shopping </a></div>
</br>
	
<?php } ?>
</div>
 <div class="v-separator"></div>
 <?php
                    if ((isset($_SESSION['cart']))&& isset($_SESSION['name'])) {
                        ?>
                <script>
                    debugger;
                     document.getElementById("div1").style.display = "none";
                       
                </script>
                <?php
                    }?>
 <div class="slide-container" id="div1">

                  <?php
                  
                    if (isset($_SESSION['cart'])) {
		?>
<h1> Checkout </h1>
<h3> Already have an account? </h3>
<div class="button"><a href= "../html/login.php" class="abutton"> Login </a></div>
</br>

<h3> New Users </h3>
<div class="button"> <a href = "#" class="abutton"> Register Here </a> </div> 
<br>

<h3>Check out as </h3>
<div class="button" ><a href = "../html/billing_info.php" class="abutton" onclick = "reload_billing()"> Guest user </a></div>
<br>

</div>
<?php } ?>
</div>
<p>&nbsp;<p>
            </div>
           
            <footer >
                <?php include './footer.php'; ?>
        </footer>
    </body></html>