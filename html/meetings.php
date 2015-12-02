<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Events</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../css/meetings.css"  rel="stylesheet">
        <style>
            .section{
                width: 80%; height:auto;  margin-top: 10%;  margin-left: 5.2%;
               font-family:Tahoma, Geneva, sans-serif; position:inherit;
            }
	   h2{ color: darkred;  }
	  span{ font-weight: bold;}

        </style>
         <link href="../css/login_css.css"  rel="stylesheet">
         <script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(37.3492,-121.9381),
    zoom:14,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>

    </head>

    <body>

           <?php include './header.php';?>

        </br>
        <div class="section">
<h1>WineYard Meetings<h2>
<h2> Taste, Network, and have fun! </h2>
	<p>WineYard is going to hos an wine event every month. The purpose of this meetings are: tasting, networking, and having fun. The events are going to happen in different locations and will be posted in the page (stay tuned!) with all the information needed.
    The events are free for our WineYard members and some are going to be open for non-members under payment.
    </p>
    </br>
    <hr>
    </br>
    <h2> DECEMBER WineYard meeting </h2>
<div class="eventimage">
 <a href = "http://www.localwineevents.com/events/detail/571535/certified-specialist-of-wine-csw-4-day-intensive-napa-valley"><img src="../img/meeting.jpg" alt="event1" class="eventimage" /></a>
</div>
<div class="description">
<p> Our first meeting is free. Come and enjoy our presentation. We will explain better how works the WineYard website.</p>
<p> Date: December 2, 2015 </p>
<p> Time: 5:00 PM - 9:00 PM</p>
<p> Location: Web Programming class</p>
<p> Cost: Free admission for all COEN 276 students!  </p>
</div>
</br>

<h3> Directions </h3>
<div id="googleMap" style="width:300px;height:300px;"></div>

<div>
<a href="#top" >
<img src="../img/top1.png" alt="back to top" width="80" height="80" style="margin-left:950px; position:relative;"/> </a>
</div>
</div>
	<br>
        <footer>
            <?php include './footer.php';?>
        </footer>
    </body></html>
