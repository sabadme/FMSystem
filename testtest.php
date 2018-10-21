<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/grid.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/version.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/detector.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/formatinf.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/errorlevel.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/bitmat.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/datablock.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/bmparser.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/datamask.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/rsdecoder.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/gf256poly.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/gf256.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/decoder.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/qrcode.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/findpat.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/alignpat.js"></script>
  <script type="text/javascript" src="jsqrcode-master/src/databr.js"></script>

</head>
<body>
  <video id="video" autoplay >
</video>
 
<button id="capture">Capture</button>
 <button id="scan">Scan</button>
<div id="output"></div>
</body>
</html>

<script>
(function() {
    /*"use strict";*/
 
    var video, $output;
    var scale = 0.25;

    const constraints = {
  video: true
};  

const video1 = document.querySelector('video');

navigator.mediaDevices.getUserMedia(constraints).
  then((stream) => {
    video1.srcObject = stream
  });
 
    var initialize = function() {
        $output = $("#output");
        video = $("#video").get(0);
        $("#capture").click(captureImage);                
    };
 
    var captureImage = function() {
        var canvas = document.createElement("canvas");
        canvas.width = 300;
        canvas.height =300;
        canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
 
        var img = document.createElement("img");
        img.setAttribute("id", "qr_id");
        img.src = canvas.toDataURL();
        $output.prepend(img);

        // A qrcode with "ourcodeworld.com" as value in format base64 encoded
            var imageURI = document.getElementById('qr_id').getAttribute('src');
            console.log(imageURI);

            /*var imageURI = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASIAAAEiAQMAAABncE31AAAABlBMVEX///8AAABVwtN+AAABA0lEQVRoge3ZUQ6CMAzG8SYcwCNx9R2JA5jU0a6ARKIP60z0/z0wZD+fmm1siBBCCPmfaMu93t/sEk8KKlv5jwrq3VT7jO4dqEy1lsT65mVS92vBUAOVKupbKmYm1DhljffpB/MXqp/aVmQfIuXNuo3qp46p4KIHlaFiTKzXRdrS4GszKlnJHCPBhkgF2z9RyWqvkNWlUdWrOqL6qZiP2kuoVWivGipT+cAosfsNOqHy1cm34txOuwBUhtKW2Hf52Zu8XLdRnVWxZtt3+duQ3gU1QD2d+kSFBDVUFX8ytZcj1Eh1OHMWQQ1Q1kSF2hb4ev5CdVTHFVl1/86FSleEEEJ+PQ/ANYzwx13NHQAAAABJRU5ErkJggg==";*/

            /**
             * The function decodeImageFromBase64 expects as first parameter a base64 string from a QRCode.
             * As second parameter the callback that expects the data from the QRCode as first parameter.
             */
            function decodeImageFromBase64(data, callback){
                // set callback
                qrcode.callback = callback;
                // Start decoding
                qrcode.decode(data)
            }

            // On button click, decode the qrCode from the base64 format.
            document.getElementById("scan").addEventListener('click',function(){
                decodeImageFromBase64(imageURI,function(decodedInformation){
                    alert(decodedInformation);
                    console.log(output);
                });
            },false);  
    };
 
    $(initialize);

         
 
}());
</script>