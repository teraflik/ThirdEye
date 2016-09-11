<!DOCTYPE html>
<html>
<head>
<?php include("header.html"); ?>
<title>Third Eye</title>
<style>
/* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
@import url(http://fonts.googleapis.com/css?family=Roboto);

html {
  height: 100%;
  overflow: hidden;
}

body { 
  margin:0;
  padding:0;
  perspective: 1px;
  transform-style: preserve-3d;
  height: 100%;
  overflow-y: scroll;
  overflow-x: hidden;
  font-family: Roboto;
}

h1 {
   font-size: 250%
}

p {
  font-size: 140%;
  line-height: 150%;
  color: #333;
}

.slide {
  position: relative;
  padding: 25vh 10%;
  min-height: 100vh;
  width: 100vw;
  box-sizing: border-box;
  box-shadow: 0 -1px 10px rgba(0, 0, 0, .8);
  transform-style: inherit;
}

.slide:before {
  content: "";
  position: absolute;
  top: 0;
  bottom: 0;
  left:0;
  right:0;
}

.title {
  width: 50%;
  padding: 5%;
  border-radius: 5px;
  background: rgba(240,230,220, 1);
  box-shadow: 0 0 8px rgba(0, 0, 0, 1);
}

.slide:nth-child(2n) .title {
  margin-left: 0;
  margin-right: auto;
}

.slide:nth-child(2n+1) .title {
  margin-left: auto;
  margin-right: 0;
}

.slide, .slide:before {
  background: 50% 50% / cover;  
}

.header {
  text-align: center;
  font-size: 175%;
  color: #fff;
  text-shadow: 0 2px 2px #000;
}

#title {
  background-image: url("media/01.jpg");
   background-attachment: fixed;  
}

#slide1:before {
  background-image: url("media/02.jpg");
  transform: translateZ(-1px) scale(2);
  z-index:-1;
}

#slide2 {
  background-image: url("media/03.jpg");
  background-attachment: fixed;
}

#slide4 {
  background: #222;
}
    </style>
  <script src="js/prefixfree.min.js"></script>
  </head>

  <body style="background-color: white;">
  <?php include("navbar.html"); ?>
    <div id="title" class="slide header">

  <h1><img src="/media/logo2.png" width="20%" /><br>Third Eye</h1>
  <hgroup></hgroup>
</div>

<div id="slide1" class="slide">
  <div class="title">

    <h1>OUR STORY</h1>
    <p>
17 hours earlier, this idea was born. Back then, we had no idea what it would become. We just knew that we wanted to make great ideas turn into reality that people would use for years.</p>
  </div>
</div>

<div id="slide2" class="slide">
  <div class="title">
    <h1>What's it about?</h1>
    <p>The website categorizes and stores the database of different resources and stuff that is available around the web. It implements a user rating based system to sort and show the visitors the most relevant content.</p>
  </div>
</div>
    
    
    
    
  </body>
</html>

</body>
</html> 