<html>
 <head>
 <title>GIFtv!</title>
 <style>
  body {
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
   }
 </style>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
 </head>
 <body>
  <div class="container">
  </div>
  <script>
  var played = [];

  $(document).ready(function(){
    getImage();
  });

  function getImage(){
    $.get('image_update.php', function(data){
      var images = $.parseJSON(data);
      playImage(images);
    });
  }

  function playImage(images) {
    var i = Math.floor(images.length*Math.random());
    // check if this image is already in the played array
    if( played.indexOf(images[i]) > -1 ) {
      // prevent an infinite recursion
      if( images.length == played.length ) {
        played = [];
      }
      getImage();
      return;
    }
    // store the randomly picked image in a played array
    played.push(images[i]);
    $('body').css({
      'background-image': 'url(' + images[i] + ')'
    });
  }

  setInterval(getImage, 3000);
  </script>
 </body>
</html>