
<div id="myModal" class="modal" style="display: none;">

    <!-- Modal content -->
    <div class="modal-content">
        <span class="close">Close</span>

        <h1>Update</h1>


<form action="" method="POST">
       
           <input type="text" id="UserID" value="<?php echo $teacherID; ?>"> 
            <select id="teacherORstudent">
                <option>Teacher</option>
                <option>Student</option>
            </select>
            <input type="" id="fname" value="<?php echo $teacherName; ?>">
            <input type="" id="mname" >
            <input type="" id="lname" >
              <button onClick='updatteacher()' class="action" name="teacherUpdate">ADD</button>
   

</form>
    </div>
</div>


