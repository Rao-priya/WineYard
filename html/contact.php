<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>contact page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">  
        <style>

            .section{
                width: 80%; height:auto;  margin-top: 10%;  margin-left: 5.2%;
                font-family: cursive; position:inherit;
            }

        </style>
         <link href="../css/login_css.css"  rel="stylesheet">
    </head>
    <body>
<header>
        <?php include './header.php';?>
</header>
        </br>
        <div class="section">
            <form action="mailto:prao@scu.edu?" 
                  method="POST" ENCTYPE="text/plain">
                  <fieldset>
                    <legend>Email your queries here</legend>
                    <label class="heading" for="name">Name: </label>
                    <input type="text" name="name" id="name" required /></br>

                    <label class="heading" for="pwd">Email ID: </label>
                    <input type="text" name="emailId" id="emailId" required /></br> 
                    </br>
                    
                     <label class="heading" for="pwd">Query: </label>
                     <textarea  name="query" id="query" required></textarea></br> 
                    </br>
                    <input type="submit" value="Submit" />
                </fieldset> 
            </form>
        </div>
<br>
        <footer>
            <?php include './footer.php';?>
        </footer>
    </body></html>