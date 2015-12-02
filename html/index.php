<html>
    <head>
        <title>Wine Yard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/index_css.css"  rel="stylesheet">
        <link href="../css/slideshow.css"  rel="stylesheet">
    </head>
    <body>
<?php
session_start();

?>
         <?php include './header.php';?>


         <div class="section">
		<p id="top">

                    <span style="color: darkred ; font-size:24px; " > Wine Yard </span> is the place for the wine lovers. 
In our website you can filter the wines based on your preferences such as: wine type, country, region and price.
The purchase process is really simple, just choose your favorite wine and click to purchase! Wine Yard also has a membership club and events agenda.
 Check it out how our membership club works! <br><br>
                  </p>



                    <div class="slideshowbanner">
                      <figure class="show"> <img src="../img/wineslideshow1.jpg" alt="slide1" class="center_img"/> </figure>
                      <figure><img src="../img/wineslideshow2.jpg" alt="slide2" class="center_img"/>  </figure>
                      <figure><img src="../img/wineslideshow3.jpg" alt="slide3" class="center_img"/>  </figure>
                      <figure><img src="../img/wineslideshow4.jpg" alt="slide3" class="center_img"/>  </figure>
                        <span class="prev">&laquo;</span>
                        <span class="next">&raquo;</span>
                    </div>

 </div>


  <script src="../js/slideshow.js"></script>
<footer >
<?php include './footer.php';?>
</footer>
    </body>
</html>
