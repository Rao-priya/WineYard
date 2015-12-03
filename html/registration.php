<?php
$entryError = 0;
$lengthCounter = 0;
$nameErr ="";
$tooLong ="";
$emailErr ="";
$invalidName = "";
$invalidAdd ="";
$invalidCity = "";
$invalidState ="";
$invalidZip ="";
$invalidCell ="";
$invalidDOB = "";
$noMatch = "";
$newrecord ="";
$errorInserting ="";
// "/*Our Databases show you already have an account";
$notIn = 0;

DEFINE('DB_USER','root');
DEFINE('DB_PSWD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','winestore');//AChange dataBAse Name as Desired (second parameter)

$dbcon = mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);

if(!$dbcon){
  die('error conncecting to Database');


}else{
// echo 'you have successfully connected';
}


if (isset($_POST['submitted'])){
  // include('connect-mysql.php') //replace with DB Connecting code

  $fname =$_POST['FirstName'];
  $lname =$_POST['LastName'];
  $title =$_POST['Title'];
  $email = $_POST['EmailAddress'];
  $shippingAddr = $_POST['ShippingAddress'];
  $shippingCity = $_POST['ShippingCity'];////Last updated
  $shippingState = $_POST['ShippingState'];
  $shippingZip = $_POST['ShippingZip'];
  $shippingCountry = $_POST['ShippingCountry'];
  $cellPhone = $_POST['CellPhone'];
  $cellPhone = preg_replace('/(\W*)/', '', $cellPhone);
  $DOB = $_POST['DOB'];
  $DOB = preg_replace('/(\W*)/', '', $DOB);
  $memType = $_POST['memType'];


  $billingAddr = $_POST['BillingAddress'];
  $billingCity = $_POST['BillingCity'];
  $billingState = $_POST['BillingState'];
  $billingZip = $_POST['BillingZip'];
  $billingCountry = $_POST['BillingCountry'];
  $username = $_POST['Username'];
  $pass = $_POST['Password'];
  $passCon = $_POST['PasswordConfirm'];

//Start Validation code
//Start Check if any input is empty
if ($fname == "") {
   $nameErr = "Please Fill All Required Fields.";
   $entryError = 1;
 }
 if ($lname == "") {
    $nameErr = "Please Fill All Required Fields.";
    $entryError = 1;
  }
  if ($title == "") {
     $nameErr = "Please Fill All Required Fields.";
     $entryError = 1;
   }
   if ($email == "") {
      $nameErr = "Please Fill All Required Fields.";
      $entryError = 1;
    }else{
      //Start EMail Validation
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Please Enter a Valid email Address.";
      }
      //End EMail Validation
    }
    if ($shippingAddr == "") {
       $nameErr = "Please Fill All Required Fields.";
       $entryError = 1;
     }

     if ($shippingCity == "") {
        $nameErr = "Please Fill All Required Fields.";
        $entryError = 1;
      }
      if ($shippingState == "") {
         $nameErr = "Please Fill All Required Fields.";
         $entryError = 1;
       }
       if ($shippingZip == "") {
          $nameErr = "Please Fill All Required Fields.";
          $entryError = 1;
        }
        if ($shippingCountry == "-- Select Country --") {
           $nameErr = "Please Fill All Required Fields.";
           $entryError = 1;
         }
         if ($cellPhone == "") {
            $nameErr = "Please Fill All Required Fields.";
            $entryError = 1;
          }
          if ($DOB == "") {
             $nameErr = "Please Fill All Required Fields.";
             $entryError = 1;
           }
           if ($memType == "") {
              $nameErr = "Please Fill All Required Fields.";
              $entryError = 1;
            }
            if ($billingAddr == "") {
               $nameErr = "Please Fill All Required Fields.";
               $entryError = 1;
             }
             if ($billingCity == "") {
                $nameErr = "Please Fill All Required Fields.";
                $entryError = 1;
              }
              if ($billingState == "") {
                 $nameErr = "Please Fill All Required Fields.";
                 $entryError = 1;
               }
               if ($billingZip == "") {
                  $nameErr = "Please Fill All Required Fields.";
                  $entryError = 1;
                }
                if ($billingCountry == "-- Select Country --") {
                   $nameErr = "Please Fill All Required Fields.";
                   $entryError = 1;
                 }
                 if ($username == "") {
                    $nameErr = "Please Fill All Required Fields.";
                    $entryError = 1;
                  }
                  if ($pass == "") {
                     $nameErr = "Please Fill All Required Fields.";
                     $entryError = 1;
                   }
                   if ($passCon == "") {
                      $nameErr = "Please Fill All Required Fields.";
                      $entryError = 1;
                    }
                    //end Check if any input is empty
                    //Start Check if Entry is too Long
                    $lengthCounter = strlen($fname);
                  if ($lengthCounter>49) {
                       $tooLong = "Please Limit Text Entries to 50 Charachters.";
                       $entryError = 1;
                     }
                       $lengthCounter = strlen($lname);
                     if ($lengthCounter>49) {
                          $tooLong = "Please Limit  Text Entries to 50 Charachters.";
                          $entryError = 1;
                        }
                        $lengthCounter = strlen($email);
                      if ($lengthCounter>49) {
                           $tooLong = "Please Limit Text Entries to 50 Charachters.";
                           $entryError = 1;
                         }
                         $lengthCounter = strlen($shippingAddr);
                       if ($lengthCounter>49) {
                            $tooLong = "Please Limit Text Entries to 50 Charachters.";
                            $entryError = 1;
                          }
                          $lengthCounter = strlen($shippingCity);
                        if ($lengthCounter>49) {
                             $tooLong = "Please Limit Text Entries to 50 Charachters.";
                             $entryError = 1;
                           }
                           $lengthCounter = strlen($shippingState);
                         if ($lengthCounter>49) {
                              $tooLong = "Please Limit Text Entries to 50 Charachters.";
                              $entryError = 1;
                            }
                            $lengthCounter = strlen($billingAddr);
                          if ($lengthCounter>49) {
                               $tooLong = "Please Limit Text Entries to 50 Charachters.";
                               $entryError = 1;
                             }
                             $lengthCounter = strlen($billingCity);
                           if ($lengthCounter>49) {
                                $tooLong = "Please Limit Text Entries to 50 Charachters.";
                                $entryError = 1;
                              }
                              $lengthCounter = strlen($billingState);
                            if ($lengthCounter>49) {
                                 $tooLong = "Please Limit Text Entries to 50 Charachters.";
                                 $entryError = 1;
                               }
                               $lengthCounter = strlen($username);
                             if ($lengthCounter>49) {
                                  $tooLong = "Please Limit Text Entries to 50 Charachters.";
                                  $entryError = 1;
                                }
                                $lengthCounter = strlen($pass);
                              if ($lengthCounter>49) {
                                   $tooLong = "Please Limit Text Entries to 50 Charachters.";
                                   $entryError = 1;
                                 }
                                 $lengthCounter = strlen($passCon);
                               if ($lengthCounter>49) {
                                    $tooLong = "Please Limit Text Entries to 50 Charachters.";
                                    $entryError = 1;
                                  }

                                  //End Check if Entry is too Long
                            //Check if Name Field Only COntains Letters and White Spaces
                            if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
                              $invalidName = "Only letters and white space allowed in Full Name.";
                              $entryError = 1;
                            }
                            if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
                              $invalidName = "Only letters and white space allowed in Full Name.";
                              $entryError = 1;
                            }
                            // if (!preg_match("/^[a-z0-9 ]*$/",$shippingAddr)) {
                            //   $invalidAdd = "Only letters and Number Allowed in Address.";
                            //   $entryError = 1;
                            // }
                            if (!preg_match("/^[a-zA-Z ]*$/",$shippingCity)) {
                              $invalidCity = "invalid City.";
                              $entryError = 1;
                            }
                            if (!preg_match("/^[a-zA-Z ]*$/",$shippingState)) {
                              $invalidState = "Only letters allowed in State Name.";
                              $entryError = 1;
                            }
                            if (!preg_match("/^[0-9]*$/",$shippingZip)) {
                              $invalidZip = "Only Numbers Allowed in Zip.";
                              $entryError = 1;
                            }else{
                            if ($shippingZip>99999) {
                                 $invalidZip = "PLease Enter a Real Zip Silly.";
                                 $entryError = 1;

                               }
                             }
                               if (!preg_match("/^[0-9]*$/",$cellPhone)) {
                                 $invalidCell = "Only Numbers in Phone (symbols OK).";
                                 $entryError = 1;
                               }else{
                               if ($cellPhone>9999999999) {
                                    $invalidCell = "Please Limit Phone Number to 10 Digits.";
                                    $entryError = 1;

                                  }
                                }

                                if (!preg_match("/^[0-9]*$/",$DOB)) {
                                  $invalidDOB = "Please enter DOB in following format: 09/06/90.";
                                  $entryError = 1;
                                }else{
                                if ($DOB>999999) {
                                     $invalidDOB = "Please enter DOB in following format: 09/06/90.";
                                     $entryError = 1;

                                   }
                                   if ($DOB<010100) {
                                        $invalidDOB = "Please enter DOB in following format: 09/06/90.";
                                        $entryError = 1;

                                      }

                                 }
                                //  if (!preg_match("/^[a-z0-9 ]*$/",$billingAddr)) {
                                //    $invalidAdd = "Only letters and Number Allowed in Address.";
                                //    $entryError = 1;
                                //  }
                                 if (!preg_match("/^[a-zA-Z ]*$/",$billingCity)) {
                                   $invalidCity = "invalid City.";
                                   $entryError = 1;
                                 }
                                 if (!preg_match("/^[a-zA-Z ]*$/",$billingState)) {
                                   $invalidState = "Only letters allowed in State Name.";
                                   $entryError = 1;
                                 }
                                 if (!preg_match("/^[0-9]*$/",$billingZip)) {
                                   $invalidZip = "Only Numbers Allowed in Zip.";
                                   $entryError = 1;
                                 }else{
                                 if ($billingZip>99999) {
                                      $invalidZip = "PLease Enter a Real Zip Silly.";
                                      $entryError = 1;

                                    }
                                  }

                                  if($pass != $passCon){
                                    $noMatch = "Please Make Sure Password and Confirmation Password Match";
                                    $entryError = 1;
                                  }



                            //End CHeck if name only contains Letters and White Spaces

                            //End Validation Code

if($entryError==0){
  $sqlinsert = "INSERT INTO members (FIRST_NAME, LAST_NAME, EMAIL, SHIPPING_ADDRESS, SHIPPING_CITY, SHIPPING_STATE, SHIPPING_ZIP, SHIPPING_COUNTRY, CELLPHONE, DOB, MEMBERSHIP_TYPE, BILLING_ADDRESS, BILLING_CITY, BILLLING_STATE, BILLING_ZIP, BILLING_COUNTRY, USERNAME, PASSWORD) VALUES ('$fname','$lname','$email','$shippingAddr','$shippingCity','$shippingState','$shippingZip','$shippingCountry','$cellPhone','$DOB','$memType','$billingAddr','$billingCity','$billingState','$billingZip','$billingCountry','$username','$pass')";
if($entryError==0){
  session_start();
  $_SESSION['name']=$username;
  header("location: ./userhomepage.php");
//$newrecord = "Congratulations! Welcome to the Wine Tipsy Lifestyle";
}
//removed title
// echo $sqlinsert;
  if(!mysqli_query($dbcon, $sqlinsert)){
      // die('error inserting new record');
      $notIn =1;
      $entryError = 1;

  }else{

    // echo $newrecord;

  }

}
}
?>


<html>
    <head>
        <title>Member Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/product.css"  rel="stylesheet">
        <link href="../css/registration.css"  rel="stylesheet">

    </head>
    <body>
<header>
         <?php include './header.php';?>
</header>



         <!--Section Start-->
         <div class="fieldset">
           <legend> Membership Sign-Up</legend>
         <!-- <h1 class="heading">Membership Sign-Up</h1> -->

         <!--Form Content Start-->

         <form name="membership" method="post" enctype="multipart/form-data" action='registration.php'>
           <!-- "insert-data.php" -->


             <span class="req">*</span>  Required
             <table class="membershipwebform" cellspacing="0" cellpadding="1" border="0">
                 <tbody >

                     <tr><!--Row STart-->
                         <td><label for="Title">Title</label><br />
                         <select name="Title" id="Title" class="acc_dropdown_smaller">
                         <option value="mr" selected="selected">MR</option>
                         <option value="mrs">MRS</option>
                         <option value="ms">MS</option>
                         </select></td>
                     <!-- </tr> -->

                         <td><label for="FirstName">First Name <span class="req">*</span></label><br />
                         <input type="text" name="FirstName" id="FirstName" class="acc_textbox" maxlength="255" /> </td>


                         <td><label for="LastName">Last Name <span class="req">*</span></label><br />
                         <input type="text" name="LastName" id="LastName" class="acc_textbox" maxlength="255" /> </td>
                         </tr><!--Row End-->



                     <tr>
                         <td><label for="EmailAddress">Email Address <span class="req">*</span></label><br />
                         <input type="text" name="EmailAddress" id="EmailAddress" class="acc_textbox" maxlength="255" /> </td>
                     </tr>

                     <tr>
                       <td class = "space">
                       </td>
                       </tr>
                     <tr>
                         <td><label for="ShippingAddress">Shipping Address <span class="req">*</span></label><br />
                         <input type="text" name="ShippingAddress" id="ShippingAddress" class="acc_textbox" maxlength="500" /></td>
                     <!-- </tr>
                     <tr> -->
                         <td><label for="ShippingCity">City <span class="req">*</span></label><br />
                         <input type="text" name="ShippingCity" id="ShippingCity" class="acc_textbox" maxlength="255" /></td>
                     </tr>
                     <tr>
                         <td><label for="ShippingState">State <span class="req">*</span></label><br />
                         <input type="text" name="ShippingState" id="ShippingState" class="acc_textbox" maxlength="255" /></td>
                         </td>

                         <td><label for="ShippingZip">Zipcode/Postcode <span class="req">*</span></label><br />
                         <input type="text" name="ShippingZip" id="ShippingZip" class="acc_textbox" maxlength="255" /></td>
                       </td>

                         <td><label for="ShippingCountry">Country <span class="req">*</span></label><br />
                         <select name="ShippingCountry" id="ShippingCountry" class="acc_dropdown">
                         <option value=" ">-- Select Country --</option>
         				<option value="US" selected="selected" >UNITED STATES</option>
                         <option value="AF">AFGHANISTAN</option>
                         <option value="AX">ALAND ISLANDS</option>
                         <option value="AL">ALBANIA</option>
                         <option value="DZ">ALGERIA</option>
                         <option value="AS">AMERICAN SAMOA</option>
                         <option value="AD">ANDORRA</option>
                         <option value="AO">ANGOLA</option>
                         <option value="AI">ANGUILLA</option>
                         <option value="AQ">ANTARCTICA</option>
                         <option value="AG">ANTIGUA AND BARBUDA</option>
                         <option value="AR">ARGENTINA</option>
                         <option value="AM">ARMENIA</option>
                         <option value="AW">ARUBA</option>
                         <option value="AU">AUSTRALIA</option>
                         <option value="AT">AUSTRIA</option>
                         <option value="AZ">AZERBAIJAN</option>
                         <option value="BS">BAHAMAS</option>
                         <option value="BH">BAHRAIN</option>
                         <option value="BD">BANGLADESH</option>
                         <option value="BB">BARBADOS</option>
                         <option value="BY">BELARUS</option>
                         <option value="BE">BELGIUM</option>
                         <option value="BZ">BELIZE</option>
                         <option value="BJ">BENIN</option>
                         <option value="BM">BERMUDA</option>
                         <option value="BT">BHUTAN</option>
                         <option value="BO">BOLIVIA</option>
                         <option value="BA">BOSNIA AND HERZEGOVINA</option>
                         <option value="BW">BOTSWANA</option>
                         <option value="BV">BOUVET ISLAND</option>
                         <option value="BR">BRAZIL</option>
                         <option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
                         <option value="BN">BRUNEI DARUSSALAM</option>
                         <option value="BG">BULGARIA</option>
                         <option value="BF">BURKINA FASO</option>
                         <option value="BI">BURUNDI</option>
                         <option value="KH">CAMBODIA</option>
                         <option value="CM">CAMEROON</option>
                         <option value="CA">CANADA</option>
                         <option value="CV">CAPE VERDE</option>
                         <option value="KY">CAYMAN ISLANDS</option>
                         <option value="CF">CENTRAL AFRICAN REPUBLIC</option>
                         <option value="TD">CHAD</option>
                         <option value="CL">CHILE</option>
                         <option value="CN">CHINA</option>
                         <option value="CX">CHRISTMAS ISLAND</option>
                         <option value="CC">COCOS (KEELING) ISLANDS</option>
                         <option value="CO">COLOMBIA</option>
                         <option value="KM">COMOROS</option>
                         <option value="CG">CONGO</option>
                         <option value="CD">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
                         <option value="CK">COOK ISLANDS</option>
                         <option value="CR">COSTA RICA</option>
                         <option value="CI">C&Ocirc;TE D'IVOIRE</option>
                         <option value="HR">CROATIA</option>
                         <option value="CU">CUBA</option>
                         <option value="CY">CYPRUS</option>
                         <option value="CZ">CZECH REPUBLIC</option>
                         <option value="DK">DENMARK</option>
                         <option value="DJ">DJIBOUTI</option>
                         <option value="DM">DOMINICA</option>
                         <option value="DO">DOMINICAN REPUBLIC</option>
                         <option value="EC">ECUADOR</option>
                         <option value="EG">EGYPT</option>
                         <option value="SV">EL SALVADOR</option>
                         <option value="GQ">EQUATORIAL GUINEA</option>
                         <option value="ER">ERITREA</option>
                         <option value="EE">ESTONIA</option>
                         <option value="ET">ETHIOPIA</option>
                         <option value="FK">FALKLAND ISLANDS (MALVINAS)</option>
                         <option value="FO">FAROE ISLANDS</option>
                         <option value="FJ">FIJI</option>
                         <option value="FI">FINLAND</option>
                         <option value="FR">FRANCE</option>
                         <option value="GF">FRENCH GUIANA</option>
                         <option value="PF">FRENCH POLYNESIA</option>
                         <option value="TF">FRENCH SOUTHERN TERRITORIES</option>
                         <option value="GA">GABON</option>
                         <option value="GM">GAMBIA</option>
                         <option value="GE">GEORGIA</option>
                         <option value="DE">GERMANY</option>
                         <option value="GH">GHANA</option>
                         <option value="GI">GIBRALTAR</option>
                         <option value="GR">GREECE</option>
                         <option value="GL">GREENLAND</option>
                         <option value="GD">GRENADA</option>
                         <option value="GP">GUADELOUPE</option>
                         <option value="GU">GUAM</option>
                         <option value="GT">GUATEMALA</option>
                         <option value="GG">GUERNSEY</option>
                         <option value="GN">GUINEA</option>
                         <option value="GW">GUINEA-BISSAU</option>
                         <option value="GY">GUYANA</option>
                         <option value="HT">HAITI</option>
                         <option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
                         <option value="VA">HOLY SEE (VATICAN CITY STATE)</option>
                         <option value="HN">HONDURAS</option>
                         <option value="HK">HONG KONG</option>
                         <option value="HU">HUNGARY</option>
                         <option value="IS">ICELAND</option>
                         <option value="IN">INDIA</option>
                         <option value="ID">INDONESIA</option>
                         <option value="IR">IRAN, ISLAMIC REPUBLIC OF</option>
                         <option value="IQ">IRAQ</option>
                         <option value="IE">IRELAND</option>
                         <option value="IL">ISRAEL</option>
                         <option value="IT">ITALY</option>
                         <option value="JM">JAMAICA</option>
                         <option value="JP">JAPAN</option>
                         <option value="JE">JERSEY</option>
                         <option value="JO">JORDAN</option>
                         <option value="KZ">KAZAKHSTAN</option>
                         <option value="KE">KENYA</option>
                         <option value="KI">KIRIBATI</option>
                         <option value="KP">KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option>
                         <option value="KR">KOREA, REPUBLIC OF</option>
                         <option value="KW">KUWAIT</option>
                         <option value="KG">KYRGYZSTAN</option>
                         <option value="LA">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
                         <option value="LV">LATVIA</option>
                         <option value="LB">LEBANON</option>
                         <option value="LS">LESOTHO</option>
                         <option value="LR">LIBERIA</option>
                         <option value="LY">LIBYAN ARAB JAMAHIRIYA</option>
                         <option value="LI">LIECHTENSTEIN</option>
                         <option value="LT">LITHUANIA</option>
                         <option value="LU">LUXEMBOURG</option>
                         <option value="MO">MACAO</option>
                         <option value="MK">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
                         <option value="MG">MADAGASCAR</option>
                         <option value="MW">MALAWI</option>
                         <option value="MY">MALAYSIA</option>
                         <option value="MV">MALDIVES</option>
                         <option value="ML">MALI</option>
                         <option value="MT">MALTA</option>
                         <option value="MH">MARSHALL ISLANDS</option>
                         <option value="MQ">MARTINIQUE</option>
                         <option value="MR">MAURITANIA</option>
                         <option value="MU">MAURITIUS</option>
                         <option value="YT">MAYOTTE</option>
                         <option value="MX">MEXICO</option>
                         <option value="FM">MICRONESIA, FEDERATED STATES OF</option>
                         <option value="MD">MOLDOVA, REPUBLIC OF</option>
                         <option value="MC">MONACO</option>
                         <option value="MN">MONGOLIA</option>
                         <option value="ME">MONTENEGRO</option>
                         <option value="MS">MONTSERRAT</option>
                         <option value="MA">MOROCCO</option>
                         <option value="MZ">MOZAMBIQUE</option>
                         <option value="MM">MYANMAR</option>
                         <option value="NA">NAMIBIA</option>
                         <option value="NR">NAURU</option>
                         <option value="NP">NEPAL</option>
                         <option value="NL">NETHERLANDS</option>
                         <option value="AN">NETHERLANDS ANTILLES</option>
                         <option value="NC">NEW CALEDONIA</option>
                         <option value="NZ">NEW ZEALAND</option>
                         <option value="NI">NICARAGUA</option>
                         <option value="NE">NIGER</option>
                         <option value="NG">NIGERIA</option>
                         <option value="NU">NIUE</option>
                         <option value="NF">NORFOLK ISLAND</option>
                         <option value="MP">NORTHERN MARIANA ISLANDS</option>
                         <option value="NO">NORWAY</option>
                         <option value="OM">OMAN</option>
                         <option value="PK">PAKISTAN</option>
                         <option value="PW">PALAU</option>
                         <option value="PS">PALESTINIAN TERRITORY, OCCUPIED</option>
                         <option value="PA">PANAMA</option>
                         <option value="PG">PAPUA NEW GUINEA</option>
                         <option value="PY">PARAGUAY</option>
                         <option value="PE">PERU</option>
                         <option value="PH">PHILIPPINES</option>
                         <option value="PN">PITCAIRN</option>
                         <option value="PL">POLAND</option>
                         <option value="PT">PORTUGAL</option>
                         <option value="PR">PUERTO RICO</option>
                         <option value="QA">QATAR</option>
                         <option value="RE">REUNION</option>
                         <option value="RO">ROMANIA</option>
                         <option value="RU">RUSSIAN FEDERATION</option>
                         <option value="RW">RWANDA</option>
                         <option value="BL">SAINT BARTH&Eacute;LEMY</option>
                         <option value="SH">SAINT HELENA</option>
                         <option value="KN">SAINT KITTS AND NEVIS</option>
                         <option value="LC">SAINT LUCIA</option>
                         <option value="MF">SAINT MARTIN</option>
                         <option value="PM">SAINT PIERRE AND MIQUELON</option>
                         <option value="VC">SAINT VINCENT AND THE GRENADINES</option>
                         <option value="WS">SAMOA</option>
                         <option value="SM">SAN MARINO</option>
                         <option value="ST">SAO TOME AND PRINCIPE</option>
                         <option value="SA">SAUDI ARABIA</option>
                         <option value="SN">SENEGAL</option>
                         <option value="RS">SERBIA</option>
                         <option value="CS">SERBIA AND MONTENEGRO</option>
                         <option value="SC">SEYCHELLES</option>
                         <option value="SL">SIERRA LEONE</option>
                         <option value="SG">SINGAPORE</option>
                         <option value="SK">SLOVAKIA</option>
                         <option value="SI">SLOVENIA</option>
                         <option value="SB">SOLOMON ISLANDS</option>
                         <option value="SO">SOMALIA</option>
                         <option value="ZA">SOUTH AFRICA</option>
                         <option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
                         <option value="ES">SPAIN</option>
                         <option value="LK">SRI LANKA</option>
                         <option value="SD">SUDAN</option>
                         <option value="SR">SURINAME</option>
                         <option value="SJ">SVALBARD AND JAN MAYEN</option>
                         <option value="SZ">SWAZILAND</option>
                         <option value="SE">SWEDEN</option>
                         <option value="CH">SWITZERLAND</option>
                         <option value="SY">SYRIAN ARAB REPUBLIC</option>
                         <option value="TW">TAIWAN</option>
                         <option value="TJ">TAJIKISTAN</option>
                         <option value="TZ">TANZANIA, UNITED REPUBLIC OF</option>
                         <option value="TH">THAILAND</option>
                         <option value="TL">TIMOR-LESTE</option>
                         <option value="TG">TOGO</option>
                         <option value="TK">TOKELAU</option>
                         <option value="TO">TONGA</option>
                         <option value="TT">TRINIDAD AND TOBAGO</option>
                         <option value="TN">TUNISIA</option>
                         <option value="TR">TURKEY</option>
                         <option value="TM">TURKMENISTAN</option>
                         <option value="TC">TURKS AND CAICOS ISLANDS</option>
                         <option value="TV">TUVALU</option>
                         <option value="UG">UGANDA</option>
                         <option value="UA">UKRAINE</option>
                         <option value="AE">UNITED ARAB EMIRATES</option>
                         <option value="GB">UNITED KINGDOM</option>
                         <option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
                         <option value="UY">URUGUAY</option>
                         <option value="UZ">UZBEKISTAN</option>
                         <option value="VU">VANUATU</option>
                         <option value="VE">VENEZUELA</option>
                         <option value="VN">VIETNAM</option>
                         <option value="VG">VIRGIN ISLANDS, BRITISH</option>
                         <option value="VI">VIRGIN ISLANDS, U.S.</option>
                         <option value="WF">WALLIS AND FUTUNA</option>
                         <option value="EH">WESTERN SAHARA</option>
                         <option value="YE">YEMEN</option>
                         <option value="ZM">ZAMBIA</option>
                         <option value="ZW">ZIMBABWE</option>
                         </select></td>
                     </tr>

                     <tr>
                       <td class = "space">
                       </td>
                       </tr>

                     <tr>
                         <td><label for="CellPhone">Cell Phone Number <span class="req">*</span></label><br />
                         <input type="text" name="CellPhone" id="CellPhone" class="acc_textbox" maxlength="255" /></td>
                     </tr>
                     <tr>
                         <td><label for="DOB">Date of Birth <span class="req">*</span></label><br />
                         <input type="text" name="DOB" id="DOB" class="acc_textbox"  /></td>
                     </tr>

                     <tr>
                       <td class = "space">
                       </td>
                       </tr>

                     <tr>
                         <td><label>Membership type <span class="req">*</span></label><br />
                         <input type="radio" name="memType" id="acc_gold" value="Gold - 12 shipments a year" checked/>Gold - 12 shipments a year<br />
                         <input type="radio" name="memType" id="acc_silver" value="Silver - 6 shipments a year" />Silver - 6 shipments a year<br />
                         <input type="radio" name="memType" id="acc_bronze" value="Bronze - 5 shipments a year" />Bronze - 5 shipments a year<br />
                         <input type="radio" name="memType" id="acc_platinum" value="Platinum - 2 shipments a year" />Platinum - 2 shipments a year<br />
                         <input type="radio" name="memType" id="acc_copper" value="Copper - 1 shipment a year" />Copper - 1 shipment a year</td>

<!--
                         <input type="radio" name="acc_gold" id="acc_gold" value="Gold - 12 shipments a year" />Gold - 12 shipments a year<br />
                         <input type="radio" name="acc_silver" id="acc_silver" value="Silver - 6 shipments a year" />Silver - 6 shipments a year<br />
                         <input type="radio" name="acc_bronze" id="acc_bronze" value="Bronze - 5 shipments a year" />Bronze - 5 shipments a year<br />
                         <input type="radio" name="acc_platinum" id="acc_platinum" value="Platinum - 2 shipments a year" />Platinum - 2 shipments a year<br />
                         <input type="radio" name="acc_copper" id="acc_copper" value="Copper - 1 shipment a year" />Copper - 1 shipment a year</td> -->
                     <!-- </tr>
                     <tr> -->

<!--
                         <td><label>Wine selection</label><br />
                         <input type="checkbox" name="acc_redWine" id="acc_redWine" value="only reds" />only reds<br />
                         <input type="checkbox" name="acc_whiteWine" id="acc_whiteWine" value="only whites" />only whites<br />
                         <input type="checkbox" name="acc_dryWine" id="acc_dryWine" value="dry" />dry<br />
                         <input type="checkbox" name="acc_semiSweet" id="acc_semiSweet" value="semi-sweet" />semi-sweet<br />
                         <input type="checkbox" name="acc_sweetWine" id="acc_sweetWine" value="sweet" />sweet<br />
                         <input type="checkbox" name="acc_variety" id="acc_variety" value="variety" />variety</td> -->
                     </tr>
                     <tr>
                       <td class = "space">
                       </td>
                       </tr>

                     <tr>
                         <td><label for="BillingAddress">Billing Address <span class="req">*</span></label><br />
                         <input type="text" name="BillingAddress" id="BillingAddress" class="acc_textbox" maxlength="500" /></td>
                     <!-- </tr>
                     <tr> -->
                         <td><label for="BillingCity">City <span class="req">*</span></label><br />
                         <input type="text" name="BillingCity" id="BillingCity" class="acc_textbox" maxlength="255" /></td>
                     </tr>
                     <tr>
                         <td><label for="BillingState">State <span class="req">*</span></label><br />
                         <input type="text" name="BillingState" id="BillingState" class="acc_textbox" maxlength="255" /></td>
                         </td>

                         <td><label for="BillingZip">Zipcode/Postcode <span class="req">*</span></label><br />
                         <input type="text" name="BillingZip" id="BillingZip" class="acc_textbox" maxlength="255" /></td>

                         <td><label for="BillingCountry">Country <span class="req">*</span></label><br />
                         <select name="BillingCountry" id="BillingCountry" class="acc_dropdown">
                         <option value=" ">-- Select Country --</option>
         				<option value="US" selected="selected">UNITED STATES</option>
                         <option value="AF">AFGHANISTAN</option>
                         <option value="AX">ALAND ISLANDS</option>
                         <option value="AL">ALBANIA</option>
                         <option value="DZ">ALGERIA</option>
                         <option value="AS">AMERICAN SAMOA</option>
                         <option value="AD">ANDORRA</option>
                         <option value="AO">ANGOLA</option>
                         <option value="AI">ANGUILLA</option>
                         <option value="AQ">ANTARCTICA</option>
                         <option value="AG">ANTIGUA AND BARBUDA</option>
                         <option value="AR">ARGENTINA</option>
                         <option value="AM">ARMENIA</option>
                         <option value="AW">ARUBA</option>
                         <option value="AU">AUSTRALIA</option>
                         <option value="AT">AUSTRIA</option>
                         <option value="AZ">AZERBAIJAN</option>
                         <option value="BS">BAHAMAS</option>
                         <option value="BH">BAHRAIN</option>
                         <option value="BD">BANGLADESH</option>
                         <option value="BB">BARBADOS</option>
                         <option value="BY">BELARUS</option>
                         <option value="BE">BELGIUM</option>
                         <option value="BZ">BELIZE</option>
                         <option value="BJ">BENIN</option>
                         <option value="BM">BERMUDA</option>
                         <option value="BT">BHUTAN</option>
                         <option value="BO">BOLIVIA</option>
                         <option value="BA">BOSNIA AND HERZEGOVINA</option>
                         <option value="BW">BOTSWANA</option>
                         <option value="BV">BOUVET ISLAND</option>
                         <option value="BR">BRAZIL</option>
                         <option value="IO">BRITISH INDIAN OCEAN TERRITORY</option>
                         <option value="BN">BRUNEI DARUSSALAM</option>
                         <option value="BG">BULGARIA</option>
                         <option value="BF">BURKINA FASO</option>
                         <option value="BI">BURUNDI</option>
                         <option value="KH">CAMBODIA</option>
                         <option value="CM">CAMEROON</option>
                         <option value="CA">CANADA</option>
                         <option value="CV">CAPE VERDE</option>
                         <option value="KY">CAYMAN ISLANDS</option>
                         <option value="CF">CENTRAL AFRICAN REPUBLIC</option>
                         <option value="TD">CHAD</option>
                         <option value="CL">CHILE</option>
                         <option value="CN">CHINA</option>
                         <option value="CX">CHRISTMAS ISLAND</option>
                         <option value="CC">COCOS (KEELING) ISLANDS</option>
                         <option value="CO">COLOMBIA</option>
                         <option value="KM">COMOROS</option>
                         <option value="CG">CONGO</option>
                         <option value="CD">CONGO, THE DEMOCRATIC REPUBLIC OF THE</option>
                         <option value="CK">COOK ISLANDS</option>
                         <option value="CR">COSTA RICA</option>
                         <option value="CI">C&Ocirc;TE D'IVOIRE</option>
                         <option value="HR">CROATIA</option>
                         <option value="CU">CUBA</option>
                         <option value="CY">CYPRUS</option>
                         <option value="CZ">CZECH REPUBLIC</option>
                         <option value="DK">DENMARK</option>
                         <option value="DJ">DJIBOUTI</option>
                         <option value="DM">DOMINICA</option>
                         <option value="DO">DOMINICAN REPUBLIC</option>
                         <option value="EC">ECUADOR</option>
                         <option value="EG">EGYPT</option>
                         <option value="SV">EL SALVADOR</option>
                         <option value="GQ">EQUATORIAL GUINEA</option>
                         <option value="ER">ERITREA</option>
                         <option value="EE">ESTONIA</option>
                         <option value="ET">ETHIOPIA</option>
                         <option value="FK">FALKLAND ISLANDS (MALVINAS)</option>
                         <option value="FO">FAROE ISLANDS</option>
                         <option value="FJ">FIJI</option>
                         <option value="FI">FINLAND</option>
                         <option value="FR">FRANCE</option>
                         <option value="GF">FRENCH GUIANA</option>
                         <option value="PF">FRENCH POLYNESIA</option>
                         <option value="TF">FRENCH SOUTHERN TERRITORIES</option>
                         <option value="GA">GABON</option>
                         <option value="GM">GAMBIA</option>
                         <option value="GE">GEORGIA</option>
                         <option value="DE">GERMANY</option>
                         <option value="GH">GHANA</option>
                         <option value="GI">GIBRALTAR</option>
                         <option value="GR">GREECE</option>
                         <option value="GL">GREENLAND</option>
                         <option value="GD">GRENADA</option>
                         <option value="GP">GUADELOUPE</option>
                         <option value="GU">GUAM</option>
                         <option value="GT">GUATEMALA</option>
                         <option value="GG">GUERNSEY</option>
                         <option value="GN">GUINEA</option>
                         <option value="GW">GUINEA-BISSAU</option>
                         <option value="GY">GUYANA</option>
                         <option value="HT">HAITI</option>
                         <option value="HM">HEARD ISLAND AND MCDONALD ISLANDS</option>
                         <option value="VA">HOLY SEE (VATICAN CITY STATE)</option>
                         <option value="HN">HONDURAS</option>
                         <option value="HK">HONG KONG</option>
                         <option value="HU">HUNGARY</option>
                         <option value="IS">ICELAND</option>
                         <option value="IN">INDIA</option>
                         <option value="ID">INDONESIA</option>
                         <option value="IR">IRAN, ISLAMIC REPUBLIC OF</option>
                         <option value="IQ">IRAQ</option>
                         <option value="IE">IRELAND</option>
                         <option value="IL">ISRAEL</option>
                         <option value="IT">ITALY</option>
                         <option value="JM">JAMAICA</option>
                         <option value="JP">JAPAN</option>
                         <option value="JE">JERSEY</option>
                         <option value="JO">JORDAN</option>
                         <option value="KZ">KAZAKHSTAN</option>
                         <option value="KE">KENYA</option>
                         <option value="KI">KIRIBATI</option>
                         <option value="KP">KOREA, DEMOCRATIC PEOPLE'S REPUBLIC OF</option>
                         <option value="KR">KOREA, REPUBLIC OF</option>
                         <option value="KW">KUWAIT</option>
                         <option value="KG">KYRGYZSTAN</option>
                         <option value="LA">LAO PEOPLE'S DEMOCRATIC REPUBLIC</option>
                         <option value="LV">LATVIA</option>
                         <option value="LB">LEBANON</option>
                         <option value="LS">LESOTHO</option>
                         <option value="LR">LIBERIA</option>
                         <option value="LY">LIBYAN ARAB JAMAHIRIYA</option>
                         <option value="LI">LIECHTENSTEIN</option>
                         <option value="LT">LITHUANIA</option>
                         <option value="LU">LUXEMBOURG</option>
                         <option value="MO">MACAO</option>
                         <option value="MK">MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF</option>
                         <option value="MG">MADAGASCAR</option>
                         <option value="MW">MALAWI</option>
                         <option value="MY">MALAYSIA</option>
                         <option value="MV">MALDIVES</option>
                         <option value="ML">MALI</option>
                         <option value="MT">MALTA</option>
                         <option value="MH">MARSHALL ISLANDS</option>
                         <option value="MQ">MARTINIQUE</option>
                         <option value="MR">MAURITANIA</option>
                         <option value="MU">MAURITIUS</option>
                         <option value="YT">MAYOTTE</option>
                         <option value="MX">MEXICO</option>
                         <option value="FM">MICRONESIA, FEDERATED STATES OF</option>
                         <option value="MD">MOLDOVA, REPUBLIC OF</option>
                         <option value="MC">MONACO</option>
                         <option value="MN">MONGOLIA</option>
                         <option value="ME">MONTENEGRO</option>
                         <option value="MS">MONTSERRAT</option>
                         <option value="MA">MOROCCO</option>
                         <option value="MZ">MOZAMBIQUE</option>
                         <option value="MM">MYANMAR</option>
                         <option value="NA">NAMIBIA</option>
                         <option value="NR">NAURU</option>
                         <option value="NP">NEPAL</option>
                         <option value="NL">NETHERLANDS</option>
                         <option value="AN">NETHERLANDS ANTILLES</option>
                         <option value="NC">NEW CALEDONIA</option>
                         <option value="NZ">NEW ZEALAND</option>
                         <option value="NI">NICARAGUA</option>
                         <option value="NE">NIGER</option>
                         <option value="NG">NIGERIA</option>
                         <option value="NU">NIUE</option>
                         <option value="NF">NORFOLK ISLAND</option>
                         <option value="MP">NORTHERN MARIANA ISLANDS</option>
                         <option value="NO">NORWAY</option>
                         <option value="OM">OMAN</option>
                         <option value="PK">PAKISTAN</option>
                         <option value="PW">PALAU</option>
                         <option value="PS">PALESTINIAN TERRITORY, OCCUPIED</option>
                         <option value="PA">PANAMA</option>
                         <option value="PG">PAPUA NEW GUINEA</option>
                         <option value="PY">PARAGUAY</option>
                         <option value="PE">PERU</option>
                         <option value="PH">PHILIPPINES</option>
                         <option value="PN">PITCAIRN</option>
                         <option value="PL">POLAND</option>
                         <option value="PT">PORTUGAL</option>
                         <option value="PR">PUERTO RICO</option>
                         <option value="QA">QATAR</option>
                         <option value="RE">REUNION</option>
                         <option value="RO">ROMANIA</option>
                         <option value="RU">RUSSIAN FEDERATION</option>
                         <option value="RW">RWANDA</option>
                         <option value="BL">SAINT BARTH&Eacute;LEMY</option>
                         <option value="SH">SAINT HELENA</option>
                         <option value="KN">SAINT KITTS AND NEVIS</option>
                         <option value="LC">SAINT LUCIA</option>
                         <option value="MF">SAINT MARTIN</option>
                         <option value="PM">SAINT PIERRE AND MIQUELON</option>
                         <option value="VC">SAINT VINCENT AND THE GRENADINES</option>
                         <option value="WS">SAMOA</option>
                         <option value="SM">SAN MARINO</option>
                         <option value="ST">SAO TOME AND PRINCIPE</option>
                         <option value="SA">SAUDI ARABIA</option>
                         <option value="SN">SENEGAL</option>
                         <option value="RS">SERBIA</option>
                         <option value="CS">SERBIA AND MONTENEGRO</option>
                         <option value="SC">SEYCHELLES</option>
                         <option value="SL">SIERRA LEONE</option>
                         <option value="SG">SINGAPORE</option>
                         <option value="SK">SLOVAKIA</option>
                         <option value="SI">SLOVENIA</option>
                         <option value="SB">SOLOMON ISLANDS</option>
                         <option value="SO">SOMALIA</option>
                         <option value="ZA">SOUTH AFRICA</option>
                         <option value="GS">SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS</option>
                         <option value="ES">SPAIN</option>
                         <option value="LK">SRI LANKA</option>
                         <option value="SD">SUDAN</option>
                         <option value="SR">SURINAME</option>
                         <option value="SJ">SVALBARD AND JAN MAYEN</option>
                         <option value="SZ">SWAZILAND</option>
                         <option value="SE">SWEDEN</option>
                         <option value="CH">SWITZERLAND</option>
                         <option value="SY">SYRIAN ARAB REPUBLIC</option>
                         <option value="TW">TAIWAN</option>
                         <option value="TJ">TAJIKISTAN</option>
                         <option value="TZ">TANZANIA, UNITED REPUBLIC OF</option>
                         <option value="TH">THAILAND</option>
                         <option value="TL">TIMOR-LESTE</option>
                         <option value="TG">TOGO</option>
                         <option value="TK">TOKELAU</option>
                         <option value="TO">TONGA</option>
                         <option value="TT">TRINIDAD AND TOBAGO</option>
                         <option value="TN">TUNISIA</option>
                         <option value="TR">TURKEY</option>
                         <option value="TM">TURKMENISTAN</option>
                         <option value="TC">TURKS AND CAICOS ISLANDS</option>
                         <option value="TV">TUVALU</option>
                         <option value="UG">UGANDA</option>
                         <option value="UA">UKRAINE</option>
                         <option value="AE">UNITED ARAB EMIRATES</option>
                         <option value="GB">UNITED KINGDOM</option>
                         <option value="UM">UNITED STATES MINOR OUTLYING ISLANDS</option>
                         <option value="UY">URUGUAY</option>
                         <option value="UZ">UZBEKISTAN</option>
                         <option value="VU">VANUATU</option>
                         <option value="VE">VENEZUELA</option>
                         <option value="VN">VIETNAM</option>
                         <option value="VG">VIRGIN ISLANDS, BRITISH</option>
                         <option value="VI">VIRGIN ISLANDS, U.S.</option>
                         <option value="WF">WALLIS AND FUTUNA</option>
                         <option value="EH">WESTERN SAHARA</option>
                         <option value="YE">YEMEN</option>
                         <option value="ZM">ZAMBIA</option>
                         <option value="ZW">ZIMBABWE</option>
                         </select></td>
                     </tr>

                     <tr>
                       <td class = "space">
                       </td>
                       </tr>

                     <tr>
                         <td><label for="Username">Username <span class="req">*</span></label><br />
                         <input type="text" name="Username" id="Username" class="acc_textbox" maxlength="255" /></td>
                     </tr>
                     <tr>
                         <td><label for="Password">Password <span class="req">*</span></label><br />
                         <input type="password" name="Password" id="Password" class="acc_textbox" maxlength="255" autocomplete="off" /></td>
                     </tr>
                     <tr>
                         <td><label for="PasswordConfirm">Confirm Password <span class="req">*</span></label><br />
                         <input type="password" name="PasswordConfirm" id="PasswordConfirm" class="acc_textbox" maxlength="255" autocomplete="off" /></td>

                     </tr>
                     <!-- <tr>
                         <td><label for="comment">Comments:</label><br />
                         <input type="text" maxlength="4000" name="comment" id="acc_comment" class="acc_textbox" /></td>
                     </tr> -->

                     <tr>
                       <td class = "space">


                          <p class = alert><?php
                                          if(strlen($nameErr)>0){
                                                  echo $nameErr. "\n" ;
                                                }
                                        if(strlen($tooLong)>0){
                                                  echo $tooLong. "\n";
                                                }
                                        if(strlen($invalidName)>0){
                                                  echo $invalidName. "\n";
                                                }
                                        if(strlen($emailErr)>0){
                                                  echo $emailErr. "\n";
                                                }
                                    if(strlen($invalidAdd)>0){
                                                  echo $invalidAdd. "\n";
                                                }
                                  if(strlen($invalidCity)>0){
                                                  echo $invalidCity. "\n";
                                                }
                                                if(strlen($invalidState)>0){
                                                  echo $invalidState. "\n";
                                                }
                                                if(strlen($invalidZip)>0){
                                                  echo $invalidZip. "\n";
                                                }
                                                if(strlen($invalidCell)>0){
                                                  echo $invalidCell. "\n";
                                                }
                                                if(strlen($invalidDOB)>0){
                                                  echo $invalidDOB. "\n";
                                                }
                                                if(strlen($noMatch)>0){
                                                  echo $noMatch. "\n";
                                                }
                                                if($notIn ==1){
                                                  $entryError = 1;
                                                  echo $errorInserting;
                                                }


                                                  ?> </p class = welcome>
                                                  <p class = alert>
                                                    <?php
                                                        echo $newrecord;
                                                     ?>
                                                    </p>

                       </td>
                       </tr>

                     <tr>
                         <td><input class="acc_button" type="submit" value="Join!" name ="submitted" id="acc_button" /></td>
                     </tr>

                 </tbody>
             </table>

         </form>

         <!--Form Content End-->

         </div>
         <!--Section End-->



       <footer>
<?php include './footer.php';?>
</footer>
  <script src="../js/product.js"></script>
    </body>
</html>
