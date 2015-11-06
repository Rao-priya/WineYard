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
         <link href="./header_css.css"  rel="stylesheet">
    </head>
    <body>
        
            <div id="header">  
                <div>
                  <figure>
                    <a href = "../html/index.php"><img src="../img/wineyard_LOGO.png" alt="logo" class="logoclass" /></a>
                    <figcaption id="captionheader">quit whining start drinking</figcaption>
                </figure>   
                </div>
                <noscript> Your browser does not support javascript. </noscript>
                <div id='searchWrapper'> 
		 <script>          
    			function ss(){
                     	 var text1= document.vrmainfrm.searchBox.value;
                     	 window.location="../html/search.php?searchtext="+text1;
                 	 }
               
            	</script>
<!-- <form id="vrmainfrm" name="vrmainfrm" method="POST" >-->
                   <input id='searchBox' type='text' placeholder='Search' name="wine"/>    
                   <a href ="javascript:ss();" ><img src="../img/search-icon.png" alt="serach" class="imgclass" /></a>  
<!--</form> -->  
		   <a><img src='../img/cart-icon.png' alt="serach" class="imgclass" /></a>       
                    <a href="../html/login.php" ><img src="../img/login_red_icon.png" alt="login" class="imgclass"/></a>
                </div>
               
                <nav id="topNav">
                    <ul>
                        <li><a href="#" title="Nav Link 1">Wines</a>
                            <ul>  
                                <li><a href="#" title="Sub Nav Link 1">Varieties</a></li>
                                <li><a href="#" title="Sub Nav Link 2">Country Wine</a></li>
                                <li><a href="#" title="Sub Nav Link 3">Imported Wine</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" title="Nav Link 1">Pairings</a>
                            <ul>  
                                <li><a href="#" title="Sub Nav Link 1">Beef</a></li>
                                <li><a href="#" title="Sub Nav Link 2">Chicken</a></li>
                                <li><a href="#" title="Sub Nav Link 3">Pasta</a></li>

                                <li class="last"><a href="#" title="Sub Nav Link 5">Fish</a></li>
                            </ul>                
                        </li>
                        <li><a href="#" title="Nav Link 1">Events</a>
                            <ul>  
                                <li><a href="#" title="Sub Nav Link 1">Wine Events</a></li>
                                <li><a href="#" title="Sub Nav Link 1">Wine Club Meetings</a></li>

                            </ul>
                        </li>
                        <li><a href="#" title="Nav Link 1">Membership</a>
                            <ul>  
                                <li><a href="#" title="Sub Nav Link 1">Benefits</a></li>
                                <li><a href="#" title="Sub Nav Link 1">Register Form</a></li>

                            </ul>
                        </li>

                        <li><a href="#" title="Nav Link 1">Contact Us</a>
                            <ul>  
                                <li><a href="#" title="Sub Nav Link 1">Contact Form</a></li>
                                <li><a href="#" title="Sub Nav Link 1">About Us</a></li>

                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
    </body>
</html>
