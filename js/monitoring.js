function addActive() {
        $('.login, .notifs, .viewbtn').click(function () {
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            }

            else {
                $(this).addClass('active');
            }

        });

        $('.logo-block .icon').click(function () {
            if ($(this).parent().parent().hasClass('active')) {
                $(this).parent().parent().removeClass('active');
            }

            else {
                $(this).parent().parent().addClass('active');
            }

        });
    }

//Hide notif count 
   $(function(){
        $(document).on("click" ,"#valueNotif" , function(){
            var notifValue = ($(this).attr("value"));   
           $.ajax({
                url : "teacher/hideNotifUpdate.php",
                method : "POST",
                data : 'notifValue=' + notifValue,
           });

        });
    });

    function empty() {
        if ($('table tbody').children().length == 0) {
            $('table tbody').html("<tr><td><p class='empty'>No Information Available.</p></td></tr>");
        }
    }


    function tabActive() {
        $('.tabs li').click(function () {

            $(this).each(function () {
                $(this).addClass('active');

                if ($(this).siblings().hasClass('active')) {
                    $(this).siblings().removeClass('active');
                }
            });
        });
    }

    function UpdateRooms(){
        var modal = $('.modal');
        var RoomName = $("input#RoomName").val();
        var RoomBuilding = $("input#RoomBuilding").val();
        var RoomFloor = $("input#RoomFloor").val();
        var RoomsID = $("input#RoomsID").val();


        $.ajax({
           url : "admin/UpdeteRooms.php",
           type :"POST",
           data :'RoomName=' + RoomName + '&RoomBuilding=' + RoomBuilding + '&RoomFloor=' + RoomFloor + '&RoomsID=' + RoomsID,
        });
        
        $(modal).css('display', 'none');
    }

    function UpdateVenue(){
        var modal = $('.modal');
        var VenueName = $("input#VenueName").val();
        var VenueBuilding = $("input#VenueBuilding").val();
        var VenueFloor = $("input#VenueFloor").val();
        var VenueID = $("input#VenueID").val();

        $.ajax({
           url : "admin/UpdateVenues.php",
           type :"POST",
           data :'VenueName=' + VenueName + '&VenueBuilding=' + VenueBuilding + '&VenueFloor=' + VenueFloor + '&VenueID=' + VenueID,
        });
        

        $(modal).css('display', 'none');
    }

    function myFunction() {
      var input = document.getElementById("Search");
      var filter = input.value.toLowerCase();
      var divTarget = document.getElementsByClassName('target');

      for (i = 0; i < divTarget.length; i++) {
        if (divTarget[i].innerText.toLowerCase().includes(filter)) {
          divTarget[i].style.display = "block";
        } else {
          divTarget[i].style.display = "none";
        }
      }
    }

    function tableSearch() {
      var input = document.getElementById("Search");
      var filter = input.value.toLowerCase();
      var divTarget = document.getElementsByClassName('tr');

      for (i = 0; i < divTarget.length; i++) {
        if (divTarget[i].innerText.toLowerCase().includes(filter)) {
          divTarget[i].style.display = "block";
        } else {
          divTarget[i].style.display = "none";
        }
      }
    }

    function updatteacher() {
        var teacherORstudent = $("select#teacherORstudent").val();
        var fname =$("input#fname").val();
        var mname =$("input#mname").val();
        var lname =$("input#lname").val();
        var UserID = $("input#UserID").val();

        $.ajax({
            url : "admin/teacher_updateFunctionModal.php",
            type :"POST",
            data :'teacherORstudent=' + teacherORstudent + '&fname=' + fname + '&mname=' + mname + '&lname=' + lname + '&UserID=' + UserID,
        });
        modal.style.display = "none";
    }

    $(function(){   
        $(document).on("click" ,".actions" , function(){
            var VenuesID = ($(this).attr("value"));
            document.getElementById("VenueID").value = VenuesID;
        });
    });

     $(function(){
        $(document).on("click" ,".action" , function(){
            var roomID = ($(this).attr("value"));   
            document.getElementById("RoomsID").value = roomID;
        });
    });

     $(function(){   
        $(document).on("click" ,".teacherUpdates" , function(){
            var teacherID = ($(this).attr("value"));
             document.getElementById("UserID").value = teacherID;           
        });
    });

    $(function(){
        $(document).on("click" , ".openOfficeUpdateModal" , function(){
            var OfficeIDs = ($(this).attr("value"));
            document.getElementById("OfficeId").value = OfficeIDs;

        });
    });

    jQuery(document).ready(function () {
        $('.block-loader').fadeOut("slow");
        $('body').addClass('loaded');
     /*   $("#count").load('admin/notif_count.php');*/
        $("#teacherBookingApproved").load('teacher/approvedCount.php');
        /*$("#bok_count").load('admin/booking_count.php');*/
        addActive();
        empty();
        tabActive();
        UpdateRooms();
        UpdateVenue();
        myFunction();
        updatteacher();

        setInterval(function() {
            $("#bookingdate").load('teacher/dateandtime.php');
        }, 7000);
    });

    jQuery(window).on('unload', function () {
        $('.block-loader').fadeIn("slow");
    });


    // THIS CODE IS AUTO UPDATE THE VALUE OF NOTIFICATION
    setInterval(function() {
    $.get('admin/notif_autoupdate.php', function(data) {
    
    });
}, 7000);

     $(function(){
        $(document).on("click" ,"#adminNotifHide" , function(){
      
        $.ajax({
                url : "admin/adminNotifHide.php",
                method : "POST",
           });
        });
    });

      $(function(){
        $(document).on("click" ,"#OfficeBookingApproved" , function(){
            var notifValue = ($(this).attr("value"));   
  
           $.ajax({
                url : "Office/officeBookingApproved.php",
                method : "POST",
                data : 'notifValue=' + notifValue,
           });

        });
    });

    $(function(){
        $(document).on("click" ,".equipmentModal" , function(){

            var equipment  = $(this).attr("value");

            $.ajax({
                url : "teacher/modal_teacher.php",
                method : "POST",
                data : 'equipment=' + equipment,
            });
            
        });
    });

 
setInterval(function() {
    
$(document).ready(function(){
    
     $("#count").load('admin/notif_count.php');

 });

    
},1000);

 
setInterval(function() {    
    
$(document).ready(function(){
   
     $("#bok_count").load('admin/booking_count.php');

 });

    
},1000);

    //technician report modal

    $(function() {
        $(document).on("click" , ".reportClass" , function (){
            var reportClass = ($(this).attr("value"));
           
            document.getElementById("reportModalValue").value = reportClass;
        });
    });

 

       function reportSendComment (){
        var doneOrnot = $("select#doneOrnot").val();
        var reportMessage = $("textarea#reportMessage").val();
        var reportModalValue = $("input#reportModalValue").val();

        $.ajax({
            url : "Technician/reportSend.php",
            method : "POST",
            data : 'doneOrnot=' + doneOrnot + '&reportMessage=' + reportMessage + '&reportModalValue=' + reportModalValue,
        });
    }

setInterval(function() {
    $.get('admin/endedBooking.php', function(data) {
    });

}, 1000);




