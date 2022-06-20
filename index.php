<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php include 'config.php' ?>

  <title>Hotel Booking</title>
</head>

<body>

  <div class="topbar">

    <div class="dropdown">
      <button class="dropbtn">Home</button>
      <div class="dropdown-content">
        <a href="index.php">Home</a>
        <a href="aboutus.php">About us</a>
        <a href="contactus.php">Contact Us</a>
        <a href="gallery.php">Gallery</a>
        <a href="reservation.php">Make a reservation</a>
        <a href="rulesandregulation.php">Rules and Regulation</a>
      </div>
    </div>

    <a style="float: right; font-size: 4ex; font-style: bold; color: gray;">Online Hotel Reservation</a>

  </div>



  <div class="main">

    <div class="w3-content " style="max-width:1100px;">
      <img class="mySlides w3-border" src="lib\img\slideshow\a.jpg" style="padding:4px;width:90%; display:none">
      <img class="mySlides w3-border" src="lib\img\slideshow\b.jpg" style="padding:4px;width:90%; ">
      <img class="mySlides w3-border" src="lib\img\slideshow\d.jpg" style="padding:4px;width:90%; display:none">
      <img class="mySlides w3-border" src="lib\img\slideshow\c.jpg" style="padding:4px;width:80%; display:none">

      <div class="w3-row-padding w3-section">
        <div class="w3-col s2">
          <img class="demo w3-opacity w3-hover-opacity-off" src="lib\img\slideshow\a.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(1)">
        </div>
        <div class="w3-col s2">
          <img class="demo w3-opacity w3-hover-opacity-off" src="lib\img\slideshow\b.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(2)">
        </div>
        <div class="w3-col s2">
          <img class="demo w3-opacity w3-hover-opacity-off" src="lib\img\slideshow\d.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(3)">
        </div>
        <div class="w3-col s2">
          <img class="demo w3-opacity w3-hover-opacity-off" src="lib\img\slideshow\c.jpg" style="width:100%;cursor:pointer" onclick="currentDiv(4)">
        </div>
      </div>


    </div>


    <script>
      function currentDiv(n) {
        showDivs(slideIndex = n);
      }

      function showDivs(n) {
        var i;
        var x = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("demo");
        if (n > x.length) {
          slideIndex = 1
        }
        if (n < 1) {
          slideIndex = x.length
        }
        for (i = 0; i < x.length; i++) {
          x[i].style.display = "none";
        }
        for (i = 0; i < dots.length; i++) {
          dots[i].className = dots[i].className.replace(" w3-opacity-off", "");
        }
        x[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " w3-opacity-off";
      }
    </script>

  </div>




</body>

</html>