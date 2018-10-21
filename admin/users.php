<div class="manage-container registration">
    <strong class="title">ACCOUNTS</strong>

    <div class="tabs-container">
        <ul class="tabs accounts">
            <li class="active">
                <span>USERS</span>
            </li>
            <?php include "admin/add_user_design.php"; ?>
            <li>
                <span>OFFICES</span>
            </li>
            <?php include "admin/add_office_design.php"; ?>
        </ul>
    </div>
</div>

<!-- <script>
    $(document).ready(function(){
        $('.tabs li').click(function(){

            $(this).each(function(){
                $(this).addClass('active');

                if($(this).siblings().hasClass('active')) {
                    $(this).siblings().removeClass('active');
                }
            });
        });
    });

    function myFunction() {
        // Declare variables
        var input, filter, table, tr, td, i;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script> -->