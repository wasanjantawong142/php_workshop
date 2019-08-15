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
                <table class="table" style="align:left">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">นามสกุล</th>
                            <th scope="col">ที่อยู่</th>
                            <th scope="col">เบอร์โทร</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            <td>0918588027</td>
                            <td style="margin-right:0px;"><button type="button" class="btn btn-warning"
                                    data-toggle="modal" data-target="#EditModal">แก้ไข</button>
                            </td>
                            <td><button type=" button" class="btn btn-danger">ลบ</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลลูกค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ชื่อ</label>
                                            <input type="text" class="form-control" name="cFName" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">นามสกุล</label>
                                            <input type="text" class="form-control" name="cLName"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">ที่อยู่</label>
                                        <input type="text" class="form-control" name="cAddress"
                                            placeholder="1234 Main St">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputAddress">เบอร์โทร</label>
                                        <input type="text" class="form-control" name="cTel" placeholder="1234 Main St">
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content -->

</body>

</html>