<?php
require_once "./database.php";
$db = new database;
$dataAccount = $db->listUser();
// echo "<pre>";
// print_r($dataAccount);

// foreach($dataAccount as $key => $value){
//     echo $value['firstname']."<br>";
// }
?>

<!doctype html>
<html lang="en">
<?php include "./component/adminHead.php" ?>

<body>
    <div class="d-flex" id="wrapper">
        <?php include "./component/adminSidebar.php" ?>
        <div id="page-content-wrapper">
            <?php include "./component/adminNav.php" ?>

            <!-- content -->
            <div class="container-fluid">
                <h1 class="mt-4">Account Management</h1> <br><br>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทร</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dataAccount as $key => $value) : ?>
                        <tr>
                            <th scope="row"><?= $key + 1 ?></th>
                            <td><?= $value['firstname'] ?></td>
                            <td><?= $value['lastname'] ?></td>
                            <td><?= $value['address'] ?></td>
                            <td><?= $value['phone_no'] ?></td>

                            <td>
                                <button type="button" class="btn btn-warning edit_data" id="<?= $value['user_id'] ?>" data-toggle="modal" data-target="#EditModal">แก้ไข</button>
                                <button type=" button" class="btn btn-danger">ลบ</button>
                            </td>
                        </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>

                <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form action="adminAccountManageSave.php" method="post">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ชื่อ</label>
                                            <input required id="name" type="text" class="form-control" name="firstname" placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">นามสกุล</label>
                                            <input required id="lastname" type="text" class="form-control" name="lastname" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">ที่อยู่</label>
                                        <input required id="address" type="text" class="form-control" name="address" placeholder="">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">เบอร์โทร</label>
                                        <input required id="tel" type="text" class="form-control" name="tel" placeholder="">
                                        <input type="hidden" name="userId" id="userId">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content -->
            <script>
                $(document).ready(function() {
                    $('#example').DataTable();

                    $(document).on('click', '.edit_data', function() {
                        var user_id = $(this).attr("id");
                        $.ajax({
                            url: "fetchData.php?method=listUser",
                            method: "GET",
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                var editData = data.filter(item => {
                                    return item.user_id === '1'
                                })
                                // console.log(editData[0].firstname);
                                $('#name').val(editData[0].firstname);
                                $('#lastname').val(editData[0].lastname);
                                $('#address').val(editData[0].address);
                                $('#tel').val(editData[0].phone_no);
                                $('#userId').val(editData[0].user_id);

                            }
                        });
                    });

                });
            </script>
</body>

</html>