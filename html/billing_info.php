<html>
    <head>
        <title>Billing Information</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href=""  rel="stylesheet">
  <style>

.section{
   width: 80%; height:auto;  margin-top: 10%;  margin-left: 5.2%;
   font-family: cursive; position:inherit;
}
 #shipping{

width:570px;
 height:600px;    
    padding: 10px;
    border: 1px solid black;
margin-left:10%;
 background-color:#B8B894;
}
#card_info{
display:inline-block;
width:400px;
}
.heading{
font-size:17px;
font-weight:bold;
}
input{
padding:5px;
float: left; margin: 0 50px 0 0;
}
select{
float: left; margin: 0 50px 0 0;
}

</style>
    </head>
    <body>

<?php
session_start(); 
if(!isset($_SESSION['cart'])){
header("Location: ../html/cart.php");
}
?>
<!-- <?php //include './header.php';?> -->
<br/>
<?php
$fname =""; $lname = ""; $address="" ; $city=""; $zipcode=""; $phone=""; $cardnumber=""; $cardId="";$no_error=0;
$fname_err =""; $lname_err = ""; $addr_err="" ; $city_err=""; $zipcode_err =""; $phone_err=""; $cardno_err=""; $cardId_err="";
$dry=99501;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $fname=remove_whitespaces($_POST["firstname"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$fname)){ // regular expression for name to contain only alphabets
          $fname_err="Incorrect FirstName. Alphabets only"; $no_error = 1;
      }
      $lname=remove_whitespaces($_POST["lastname"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$lname)){ // regular expression for name to contain only alphabets
          $lname_err="Only letters and white spaces allowed"; $no_error = 1;
      }
      $address=remove_whitespaces($_POST["address"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$address)){ // regular expression for name to contain only alphabets
          $addr_err="Only letters and white spaces allowed";$no_error = 1;
      }
      $city=remove_whitespaces($_POST["city"]); //first remove whietspaces from name field
      if(!preg_match("/^([A-Za-z]+ )+[A-Za-z]+$|^[A-Za-z]+$/",$city)){ // regular expression for name to contain only alphabets
          $city_err="Only letters and white spaces allowed";$no_error = 1;
      }
     $zipcode=remove_whitespaces($_POST["zipcode"]);
     if(!preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)){
       $zipcode_err = "not a valid zipcode";$no_error = 1;
     }
     $phone=remove_whitespaces($_POST["phone"]);
     if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
        $phone_err="not a valid phone number";$no_error = 1;
      }
echo $fname . $lname. $address. $city. $zipcode. $phone.$cardnumber. $cardId;
     if ($no_error == 0) {
                if (isset($_SESSION['name'])) {
                    $conn = mysqli_connect('localhost', 'root', '', 'winestore');
                    if ($conn->connect_error) {
                        die("Connection failed!" . $conn->connect_error);
                    } else {
                        $username = $_SESSION['name'];
                        $p="";$subtotal=0; $totalprice =0;
			$date = date("Y/m/d");
                         foreach($_SESSION['product-cart'] as $key => $val) { 
                           if (array_key_exists($val, $_SESSION['cart'])) {
                           
                              $p = $p. $val.",";
                              $subtotal = $_SESSION['cart'][$val]['quantity'] * $_SESSION['cart'][$val]['price'];
                               $totalprice+=$subtotal;
                         }} 
			 $p =substr($p, 0, -1); 
                         $count = count($_SESSION['cart']);                      
                         
                         
                         $sql ="INSERT INTO `winestore`.`transaction` ( `username`, `productID`, `quantity`, `totalprice`, `date`)  "
                            . "   VALUES ( '$username', '$p',$count, $totalprice,'$date')";
		         echo "sql".$sql;
			if ($conn->query($sql) === TRUE) {
    				echo "Thank your for your Business!"; 
				unset($_SESSION['cart']);   unset($_SESSION['product-cart']); 
			} else {
    				echo "Error: " . $sql . "<br>" . $conn->error;
			}
                        $conn->close();
                    }
                } else { //guest user
			
                    echo "Thank you for you Business. Come Again!";
		    unset($_SESSION['cart']);   unset($_SESSION['product-cart']); 
                }
            }

}//if
function remove_whitespaces($data){
    $data = trim($data);
  //  $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<div class="section">

<div id="shipping">

            <p class ="heading">Shipping Information </p>
             <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
                  method="POST"  class="contactborder">

                <input type="text" name="firstname" value="<?php if(!$fname_err) {echo $fname;} ?>" placeholder="<?php if($fname_err) {  echo $fname_err; } else {echo 'First Name' ;} ?>" required/>	
                <input type="text" name="lastname"value="<?php echo $lname; ?>" placeholder="Last Name" required/>
	        
		<span class="error">*<?php echo $lname_err; ?></span><br><br>
                <input type="text" name="address" placeholder="Address" required/>
		<span class="error">*<?php echo $addr_err; ?></span><br><br>
                <!--<input type="text" name="address2" placeholder="Address 2 (optional)"/><br><br> -->
                <select name="options" id = "options" >
                    <option value="DE">DE</option>
                    <option value="AA">AA</option>
                    <option value="AE">AE</option>
                    <option value="AK">AK</option>
                    <option value="AL">AL</option>
                    <option value="AP">AP</option>
                    <option value="AR">AR</option>
                    <option value="AS">AS</option>
                    <option value="AZ">AZ</option>
                    <option value="CA">CA</option>
                    <option value="CO">CO</option>
                    <option value="CT">CT</option>
                    <option value="DC">DC</option>
                    <option selected="selected" value="">Select State</option>
                    <option value="FL">FL</option>
                    <option value="GA">GA</option>
                    <option value="GU">GU</option>
                    <option value="HI">HI</option>
                    <option value="IA">IA</option>
                    <option value="ID">ID</option>
                    <option value="IL">IL</option>
                    <option value="IN">IN</option>
                    <option value="KS">KS</option>
                    <option value="KY">KY</option>
                    <option value="LA">LA</option>
                    <option value="MA">MA</option>
                    <option value="MD">MD</option>
                    <option value="ME">ME</option>
                    <option value="MI">MI</option>
                    <option value="MN">MN</option>
                    <option value="MO">MO</option>
                    <option value="MS">MS</option>
                    <option value="MT">MT</option>
                    <option value="NC">NC</option>
                    <option value="ND">ND</option>
                    <option value="NE">NE</option>
                    <option value="NH">NH</option>
                    <option value="NJ">NJ</option>
                    <option value="NM">NM</option>
                    <option value="NV">NV</option>
                    <option value="NY">NY</option>
                    <option value="OH">OH</option>
                    <option value="OK">OK</option>
                    <option value="OR">OR</option>
                    <option value="PA">PA</option>
                    <option value="PR">PR</option>
                    <option value="RI">RI</option>
                    <option value="SC">SC</option>
                    <option value="SD">SD</option>
                    <option value="TN">TN</option>
                    <option value="TX">TX</option>
                    <option value="UT">UT</option>
                    <option value="VA">VA</option>
                    <option value="VI">VI</option>
                    <option value="VT">VT</option>
                    <option value="WA">WA</option>
                    <option value="WI">WI</option>
                    <option value="WV">WV</option>
                    <option value="WY">WY</option>

                </select>
                <span class="error"><p id ="state_err"></p></span><br/><br>
                <input type="text" name="city" placeholder="city" required/>		
                <input type="text" name="zipcode" placeholder="Zip Code" required/>
		<span class="error"><?php echo $city_err; ?></span>
		<span class="error">*<?php echo $zipcode_err; ?></span><br><br>
                <input type="text" name="phone" placeholder="111-222-4444" required/>
		<span class="error">*<?php echo $phone_err; ?></span><br/>

                 <p class ="heading">Card Information</p>
                <select>
                    <option selected="selected" value="">Type of Card</option>
                    <option value="VISA">Visa</option>
                    <option value="MC">Mastercard</option>
                    <option value="AMEX">American Express</option>
                    <option value="JCB">JCB</option>
                    <option value="DISC">Discover</option>
		</select><br/><br>
                    <input type="text" name="cardnumber" placeholder="Card Number" required/>    
		    
		    <input type="text" name="cardId" placeholder="Card ID#" required/>
		    <span class="error"><?php echo $cardno_err; ?></span>
		    <span class="error">*<?php echo $cardId_err; ?></span><br/><br>
                    <select>
                        <option value="">Month</option>
                        <option value="1">01</option>
                        <option value="2">02</option>
                        <option value="3">03</option>
                        <option value="4">04</option>
                        <option value="5">05</option>
                        <option value="6">06</option>
                        <option value="7">07</option>
                        <option value="8">08</option>
                        <option value="9">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>

                    </select>
                    <select>
                        <option value="">Year</option>
                        <option value="2015">2015</option>
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>

                    </select>
</br><br>
                   
		<input type="reset" value="Reset">
                <input type="submit" value="Continue">
            </form>

</div>
        </div>
<script>
document.getElementById('options').onchange = function() {

     var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      myFunction(xhttp);
    }
  };
  xhttp.open("GET", "../database/drycodes.xml", true);
  xhttp.send();
 }
function myFunction(xml) {
  var i,flag=0;
  var xmlDoc = xml.responseXML;
debugger;
  var x = xmlDoc.getElementsByTagName("state");

var state = document.getElementById('options').value;

 for (i = 0; i <x.length; i++) { 
if(state == x[i].childNodes[0].nodeValue){
 document.getElementById("state_err").style.display ="visible";
document.getElementById("state_err").innerHTML = " we are unable to ship wine "+
 "to AL, AR, DE, KY, MS,  OK, RI, SD, or UT. Due to state laws we are "+
"unable to expedite shipping to AZ or NJ";
flag=1;
}

}
if (flag == 0) { document.getElementById("state_err").style.display ="none";}

  }

</script>
<!--
<footer>
<?php //include './footer.php';?>
</footer>
-->
    </body>

</html>