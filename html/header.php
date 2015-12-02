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
        <link href="../css/header_css.css"  rel="stylesheet">
    </head>
    <body>

        <div id="header">
            <div>

                    <a href = "../html/index.php"><img src="../img/wineyard_LOGO_1.png" alt="logo" class="logoclass" /></a>
                    <figcaption id="captionheader">quit whining start drinking</figcaption>

            </div>
            <noscript> Your browser does not support javascript. </noscript>
            <div id='searchWrapper'>
                <script>
                    function display() {
                        var x = Math.floor((Math.random() * 10) + 1);
                        document.getElementById("item_count").innerHTML = count($_SESSION['cart']);
                    }

                    function showHint(str) {
                        var xhttp;
                        document.getElementById("sugges").style.visibility = "visible";
                        if (str.length == 0) {
                            document.getElementById("txtHint").innerHTML = "";
                            return;
                        }
                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function () {
                            if (xhttp.readyState == 4 && xhttp.status == 200) {
                                document.getElementById("txtHint").innerHTML = xhttp.responseText;
                            }
                        };
                        xhttp.open("GET", "../html/search.php?q=" + str, true);
                        xhttp.send();
                    }
		 /* function cartItem_Count(x) {
			document.getElementById("x").innerHTML = <?php //if($_SESSION['cart']) { echo  count($_SESSION['cart']);} ?>;
		   }*/

                </script>

                <div id="searchdiv">
                    <input id='searchBox' type='text' placeholder='Search your favorite wine here ...' name="wine"  onkeyup="showHint(this.value)"/>
                    <a onclick="location.href='../html/search.php?wine='+ document.getElementById('searchBox').value;"><img src="../img/search-icon.png" alt="search" class="imgclass" /></a>
                </div>

                <div class="cart_image">
                    <a href="../html/cart.php" ><img src="../img/cart-icon.png" alt="cart"  class="imgclass" onmouseover ="cartItem_Count(this)"/></a>

                </div>
<a href="../html/login.php" ><img src="../img/login_red_icon.png" alt="login" class="imgclass"/></a>
 <?php
if (isset($_SESSION['name'])) {
?>
<a href = "../html/userhomepage.php" ><img src="../img/person.png" alt="account" width=50 height=50 /></a>
<?php
echo "Welcome ".$_SESSION['name'];
} ?>


<!-- session cart count <span><h2 id ="x" style="left:5%;"> </h2></span>-->
		<p id="sugges">Suggestion: <span id="txtHint"></span></p>


            </div>

            <nav id="topNav">
                <ul>
                    <li><a href="#" title="Nav Link 1" class="a_color">Wines</a>
                        <ul>

                            <li><a href="./national_wine.php" title="National Wine" class="a_color">National Wine</a></li>
                            <li><a href="./imported_wine.php" title="Imported Wine" class="a_color">Imported Wine</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" title="Nav Link 1" class="a_color">Pairings</a>
                        <ul>
                            <li><a href="./pairing_beef.php" title="Beef" class="a_color">Beef</a></li>
                            <li><a href="./pairing_chicken.php" title="Chicken" class="a_color">Chicken</a></li>
                            <li><a href="./pairing_pasta.php" title="Pasta" class="a_color">Pasta</a></li>
                            <li class="last"><a href="./pairing_fish.php" title="Fish" class="a_color">Fish</a></li>


                        </ul>
                    </li>
                    <li><a href="#" title="Nav Link 1" class="a_color">Events</a>
                        <ul>
                            <li><a href="./events.php" title="Wine events" class="a_color">Wine Events</a></li>
                            <li><a href="./meetings.php" title="meetings" class="a_color">Wine Club Meetings</a></li>

                        </ul>
                    </li>
                    <li><a href="#" title="Nav Link 1" class="a_color">Membership</a>
                        <ul>
                              <li><a href="./benefits.php" title="benefits" class="a_color">Benefits</a></li>
                            <li><a href="./registration.php" title="Register" class="a_color">Register Form</a></li>

                        </ul>
                    </li>

                    <li><a href="#" title="Nav Link 1" class="a_color">Contact Us</a>
                       <ul>
                              <li><a href="./contact.php" title="contact" class="a_color">Contact Form</a></li>
                        </ul>
                    </li>



                </ul>
            </nav>
        </div>
    </body>
</html>
