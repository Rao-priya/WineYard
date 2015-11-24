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

width:400px;
 height:630px;    
    padding: 10px;
    border: 1px solid black;
margin-left:40%;
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
padding:4px;
}
</style>
    </head>
    <body>

<?php
session_start(); 
if(!isset($_SESSION['cart'])){
header("Location: ../html/product.php");
}
?>
<!-- <?php //include './header.php';?> -->
<br/>
<?php
$fname =""; $lname = ""; $address="" ; $city=""; $zipcode=""; $phone=""; $cardnumber=""; $cardId="";
$fname_err =""; $lname_err = ""; $addr_err="" ; $city_err=""; $zipcode_err =""; $phone_err=""; $cardno_err=""; $cardId_err="";
$dry=99501;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $fname=remove_whitespaces($_POST["firstname"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$fname)){ // regular expression for name to contain only alphabets
          $fname_err="Only letters and white spaces allowed";
      }
      $lname=remove_whitespaces($_POST["lastname"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$lname)){ // regular expression for name to contain only alphabets
          $lname_err="Only letters and white spaces allowed";
      }
      $address=remove_whitespaces($_POST["address"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$address)){ // regular expression for name to contain only alphabets
          $addr_err="Only letters and white spaces allowed";
      }
      $city=remove_whitespaces($_POST["city"]); //first remove whietspaces from name field
      if(!preg_match("/^[a-zA-Z]*$/",$city)){ // regular expression for name to contain only alphabets
          $city_err="Only letters and white spaces allowed";
      }
     $zipcode=remove_whitespaces($_POST["zipcode"]);
     if(!preg_match('/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode)){
       $zipcode_err = "not a valid zipcode";
     }
    /* $phone=remove_whitespaces($_POST["phone"]);
     if(!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
        $phone_err="not a valid phone number";
      }*/
//wine law prohibition
if($zipcode == $dry){
echo " By law of the state cannot ship wine to this zipcode . Sorry!";
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

                <input type="text" name="firstname" value="<?php echo $fname; ?>" placeholder="First Name" required/>
		<span class="error">*<?php echo $fname_err; ?></span><br><br>
                <input type="text" name="lastname"value="<?php echo $lname; ?>" placeholder="Last Name" required/>
		<span class="error">*<?php echo $lname_err; ?></span><br><br>
                <input type="text" name="address" placeholder="Address" required/>
		<span class="error">*<?php echo $addr_err; ?></span><br><br>
                <input type="text" name="address2" placeholder="Address 2 (optional)"/><br><br>
                <select>
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
                <input type="text" name="city" placeholder="city" required/>
		<span class="error">*<?php echo $city_err; ?></span><br/><br>
                <input type="text" name="zipcode" placeholder="Zip Code" required/>
		<span class="error">*<?php echo $zipcode_err; ?></span><br>
                <input type="text" name="phone" placeholder="Phone#" required/>
		<span class="error">*<?php echo $phone_err; ?></span><br/>

                 <p class ="heading">Card Information</p>
                <select>
                    <option selected="selected" value="">Type of Card</option>
                    <option value="VISA">Visa</option>
                    <option value="MC">Mastercard</option>
                    <option value="AMEX">American Express</option>
                    <option value="JCB">JCB</option>
                    <option value="DISC">Discover</option>
		</select><br/>
                    <input type="text" name="cardnumber" placeholder="Card Number" required/>
		    <span class="error">*<?php echo $cardno_err; ?></span><br/><br>
		    
		    <input type="text" name="cardId" placeholder="Card ID#" required/>
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
                <input type="submit" value="Submit">
            </form>

</div>
        </div>
<!--
<footer>
<?php //include './footer.php';?>
</footer>
-->
    </body>

</html>