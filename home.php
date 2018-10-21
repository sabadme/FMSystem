
<!DOCTYPE html>
<html>
<head>
	<title>Monitoring</title>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css">
	<link rel="stylesheet" type="text/css" href="css/owl.theme.default.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/jQuery.print.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
</head>

<body class="home-index">
	<div class="block-loader">
 		<div class="loader-gear"></div> 
	</div>

	<div class="page-wrapper">
	
		<header>

			<div class="logo-container">
				<img src="images/lccb.png" />

				<span>Facility Management System</span>
			</div>

			<div class="login-container">
				<a href="#about">About</a> 
				<a href="#what">What's Inside</a> 
				<span class="login">LOGIN</span>
				<?php include"login.php"; ?> 
			</div>

		</header>

		<div class="page-main">
			<!-- <div class="banner-slider owl-carousel">
				
					<div><img src="images/banner-placeholder1.jpg"></div>
					<div><img src="images/banner-placeholder2.jpg"></div>
					<div><img src="images/banner-placeholder.jpg"></div>
					<div><img src="images/banner-placeholder.jpg"></div>
			</div> -->
			<!-- <div class="slider"> 
				<img src="images/1.jpg" class="mySlide">
				<img src="images/2.jpg" class="mySlide">
				<img src="images/3.jpg" class="mySlide">
				<img src="images/4.jpg" class="mySlide">
				<img src="images/5.jpg" class="mySlide">
			</div> -->
			<div class="banner-home">
				<img src="images/213.jpg">
			</div>

			<div class="aboutus" id="about">
				<h1>ABOUT US</h1>
				<p>The Facility Management System for LCC-B is an online based system that
				will digitize the process of facilities and equipment monitoring, inventory updates,
				maintenance reports, and booking. It gives the users the ability to do these
				procedures and transactions conveniently.
				It features registered school facilities and equipment, their
				generated QR code (Quick Response Code Technology), and the complete details
				regarding their maintenance and repair records. Monitoring systems are ideally
				used by schools when they are monitoring school equipment, usually for the
				purpose of repair and maintenance updates; regularly checking the facility and
				equipment’s condition. It allows the administrator to supervise the maintenance
				without it becoming time-consuming and tedious. The QR Code will help the administrator in checking the equipment
				status and repair records.
				</p>
			</div>

			<div class="whats-container" id="what">
				<h1>WHAT'S INSIDE?</h1>

					<div class="page-text-container">
					<div class="page-text">
						<img src="images/scaning.png">
						<div>				
							<span>MANAGE EQUIPMENTS</span>
							<p>The system created to assist in managing facilities and equipment. The administrator can add an equipment individually, by set, and by group. The equipment can then be assigned to a room.
							</p>
						</div>
					</div>

					<div class="page-text">
						<img src="images/printing.png">

						<div>
							<span>GENERATE / PRINT QR CODES</span>
							<p>The added facilities and equipment has an auto-generated Quick Response Code Technology, or a QR Code. The administrator can print the QR Code as a sticker which will be attached to the equipment. An instant scan on the QR Code gives the administrator direct access to the repair and maintenance records of the school facilities and equipment.
							</p>
						</div>
					</div>

					<div class="page-text">
						<img src="images/monitoring.png">
						<div>
							<span>FACILITY EQUIPMENT MONITORING</span>
							<p>The administrator can update and facility and equipment data digitally. LCC-B offices and teaching personnel can use the system to send repair and maintenance reports to the administrator in the event of an equipment malfunction. They can also use the system for facilities and equipment booking.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include"footer.php"; ?>
	</div>
</body>

	
</html>

<script>
	function addActive(){
		$('.login').click(function(){
			if ($('.login').hasClass('active')) {
				$(this).removeClass('active');
			}

			else {
				$(this).addClass('active');
			}

		});
	}

	function links() {
	// Add smooth scrolling to all links
	  $(".login-container > a").on('click', function(event) {

	    // Make sure this.hash has a value before overriding default behavior
	    if (this.hash !== "") {
	      // Prevent default anchor click behavior
	      event.preventDefault();

	      // Store hash
	      var hash = this.hash;

	      // Using jQuery's animate() method to add smooth page scroll
	      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
	      $('html, body').animate({
	        scrollTop: $(hash).offset().top
	      }, 800, function(){
	   
	        // Add hash (#) to URL when done scrolling (default click behavior)
	        window.location.hash = hash;
	      });
	    } // End if
	  });
	}

	/*var index = 0;
	carousel ();

	function	carousel(){
	var i;
	var x=document.getElementsByClassName("mySlide");

	for (i = 0; i <x.length;i++){
		x[i].style.display = "none";
	}
	index++;
	if(index > x.length){index = 1}
		x[index - 1].style.display = "block";
	setTimeout(carousel,2000);
	}*/


	/*function loadCarousel() {
        var itemListContainer = $('.banner-slider');
            itemListContainer.show();
    }

    function owlCarousel() {
    	$('.banner-slider').owlCarousel({
            loop: true,
            margin: 5,
            items: 1,
            autoplay:true,
    		autoplayTimeout:2000
        });
    }*/

	jQuery(document).ready(function(){
		$('.block-loader').fadeOut("slow");
		$('body').addClass('loaded');
		addActive();
	 	/*loadCarousel();
        owlCarousel();*/
        links();
	});

	jQuery(window).on('unload', function(){
		$('.block-loader').fadeIn("slow");
	});
</script>


