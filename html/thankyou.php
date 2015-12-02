<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <style>
.section{
   width: 80%; height:auto;  margin-top: 10%;  margin-left: 5.2%;
   font-family:Tahoma, Geneva, sans-serif; position:inherit;
} 

</style>
      
 </head>
<?php include './header.php';?>
 <body>
       <div class="section">
           <?php
           if(isset($_REQUEST['q'])){
    ?>
           <h3>Thank you for your business.</h3>
           <p><a href ="../html/index.php">continue shopping!</a></p>
		<img src="../img/wine-happiness-delivered.jpg" alt="delivered" width=850 height=550 />
           <?php }
    ?>
     </div>
<footer>
<?php include './footer.php';?>
</footer>
</body></html>
 