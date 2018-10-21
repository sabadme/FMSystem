<!DOCTYPE html>
<html>
  <head>
    <title>Instascan</title>
    
    <script type="text/javascript" src="js/instascan.min.js"></script>
   
    <!-- <script type="text/javascript" src="browserify/index.js"></script>
    <script type="text/javascript">
      const Instascan = require('instascan');      
    </script> -->
<!--     <script type="text/javascript" src="instascan/index.js"></script>
 -->  </head>
  <body>

    <video id="preview" autoplay></video>
    <script type="text/javascript">
      /*var Instascan = require('npm/node_modules/instascan');*/

      var video = document.getElementById('preview');

      // Get access to the camera!
      if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        // Not adding `{ audio: true }` since we only want video now
        navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        });
      }

      /* Legacy code below: getUserMedia */
else if(navigator.getUserMedia) { // Standard
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}


      /*let scanner = new Instascan.Scanner({
       

        video: document.getElementById('preview');
      });
        
        scanner.addListener('scan', function (content) {
        
        console.log(content);
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });*/
    </script>
  </body>
</html>