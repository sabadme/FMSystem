
<div class="scanner-container">
   <div class="top-container">
    <strong>QR Scanner</strong>

    <div class="notifs-container">
        <strong class="notifs" value="<?php echo $accountname; ?>" id="OfficeBookingApproved"></strong>
        <span id="teacherBookingApproved" class="counter""></span>
   

        <div class="notifs-wrapper">
            <strong >Notifications</strong>

            <table id="myTable">
                <thead> 
                        <th>Venue</th>
                        <th>Date Start</th>
                        <th>Date End</th>
                </thead>    

                <tbody>
                    <?php include"Office/bookingApproved.php"; ?>
                </tbody>
            </table>

            <form action="" method="POST">
                <button title="Notifications" name="notifs" type="submit">View All</button>
            </form>
        </div>

    </div>
    <a href="logout.php" class="logout"></a>
</div>

  <div class="scan-wrapper">
    <form action="" method="POST" class="scannercam">
    
      <button name="closeCam" type="submit">Close</button>


      <video id="preview"></video>

      <input type="text" id="scannerValue" name="equipmentData" value="<?php echo $content; ?>" placeholder="Scan or enter QR code to locate">

      <button class="locate" name="equipmentLocation">LOCATE</button>

    </form>
  </div>
</div>




<script>
	  let scanner = new Instascan.Scanner({ 
      video: document.getElementById('preview') 
    });
    
        scanner.addListener('scan', function (content) {
         /* alert(content); */
          document.getElementById("scannerValue").value = content;
        });
        Instascan.Camera.getCameras().then(function (cameras) {
          if (cameras.length > 0) {
            scanner.start(cameras[0]);
          } else {
            console.error('No cameras found.');
          }
        }).catch(function (e) {
          console.error(e);
        });  
</script>