<div class="manage-container">
    <strong class="title">ADD EQUIPMENTS FOR SET</strong>

    <div class="inner-form-container">
    <div class="table-container" id="wrapper">
            <form action="" method="POST">
            <table>
                <thead>
                <th></th>
                <th>Code</th>
                <th>Name</th>
                <th>Registered</th>
                <th>Expiration</th>
                </thead>    

                <tbody>
            <?php include"admin/set_equipment_table.php"; ?>
                </tbody>
            </table>
            <button style="margin-top: 20px;" class="action" name="Add_equipment_set" type="submit">Add</button>
            </form>
        </div>
    </div>
</div>
