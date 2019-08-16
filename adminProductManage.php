<!doctype html>
<html lang="en">
<?php 
include "./component/adminHead.php";
require_once("./database.php");
$db = new database;
$infor_product = $db->listProduct();
// print_r($infor_product[1]);
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php include "./component/adminSidebar.php" ?>
        <div id="page-content-wrapper">
            <?php include "./component/adminNav.php" ?>

            <!-- content -->
            <div class="container-fluid">
                <h1 class="mt-4">Product Management</h1>
                <td style="margin-right:0px;"><button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#CreateProduct">เพิ่มสินค้า</button>
                </td><br><br>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">ชื่อสินค้า</th>
                            <th scope="col">แบรนด์</th>
                            <th scope="col">รุ่น</th>
                            <th scope="col">สี</th>
                            <th scope="col">ไซต์</th>
                            <th scope="col">รูปภาพ</th>
                            <th scope="col">ราคา</th>
                            <th scope="col">จำนวน</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($infor_product as $row) {
                            echo "<tr>";
                            echo "<th scope=row>$i</th>";
                            echo "<td>" . $row['product_name'] . "</td>";
                            echo "<td>" . $row['brand'] . "</td>";
                            echo "<td>" . $row['type'] . "</td>";
                            echo "<td>" . $row['color'] . "</td>";
                            echo "<td>" . $row['size'] . " </td>";
                            echo "<td>" . $row['picture'] . " </td>";
                            echo "<td>" . $row['price'] . "</td>";
                            echo "<td>" . $row['qty'] . " </td>";
                            echo "<td><button type='button' class='btn btn-warning edit_data' data-toggle='modal' data-target='#EditModal' id=" . $row['product_id'] . ">แก้ไข</button>";
                            echo "<button type='button' class='btn btn-danger del_data' data-toggle='modal' data-target='#DeleteProduct' id=" . $row['product_id'] . ">ลบ</button></td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>

                </table>
                <div class="modal fade" id="EditModal" tabindex="-1" role="dialog " aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role=" document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">แก้ไขข้อมูลสินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="adminProductManageSave.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md- 6">
                                            <label for="inputEmail4">ชื่อสินค้า</label>
                                            <input type="text" class="form-control" name="pName" id="pName">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">แบรนด์</label>
                                            <input type="text" class="form-control" name="pBrand" id="pBrand"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">รุ่น</label>
                                            <input type="text" class="form-control" name="pType" id="pType"
                                                placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">ไซต์</label>
                                            <input type="text" class="form-control" name="pSize" id="pSize"
                                                placeholder="">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">สี</label>
                                            <input type="text" class="form-control" name="pColor" id="pColor"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ราคา</label>
                                            <input type="text " class="form-control" name="pPrice" id="pPrice"
                                                placeholder="">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">จำนวน</label>
                                            <input type="text" class="form-control" name="pQty" id="pQty"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">เลือกรูปภาพใหม่</label>
                                        <input type="file" class="form-control-file" name="pPicture" id="pPicture">
                                    </div>
                                    <input type="hidden" name="productId" id="productId">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="CreateProduct" tabindex="-1" role="dialog "
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role=" document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">เพิ่มข้อมูลสินค้า</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="adminProductManageInsert.php" method="post" enctype="multipart/form-data">
                                    <div class="form-row">
                                        <div class="form-group col-md- 6">
                                            <label for="inputEmail4">ชื่อสินค้า</label>
                                            <input type="text" class="form-control" name="pName"
                                                placeholder="ชื่อสินค้า">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">แบรนด์</label>
                                            <input type="text" class="form-control" name="pBrand" placeholder="แบรนด์">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">รุ่น</label>
                                            <input type="text" class="form-control" name="pType" placeholder="รุ่น">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">ไซต์</label>
                                            <input type="text" class="form-control" name="pSize" placeholder="ไซต์">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">สี</label>
                                            <input type="text" class="form-control" name="pColor" placeholder="สี">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ราคา</label>
                                            <input type="text " class="form-control" name="pPrice" placeholder="ราคา">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">จำนวน</label>
                                            <input type="text" class="form-control" name="pQty" placeholder="จำนวน">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">เลือกรูปภาพ</label>
                                        <input type="file" class="form-control-file" name="pPicture">
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal fade" id="DeleteProduct" tabindex="-1" role="dialog "
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Do you want delete?</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="adminProductManageDel.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="productId" id="productIdDel">

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">OK</button></a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- content -->

            </div>
        </div>
        <script>
        $(document).ready(function() {
            $('#example').DataTable();
            $(document).on('click', '.edit_data', function() {
                var product_id = $(this).attr("id");
                console.log(product_id);
                $.ajax({
                    url: "fetchData.php?method=listProduct",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        var editData = data.filter(item => {
                            return item.product_id === product_id
                        })
                        // console.log(editData[0].firstname);
                        $('#pName').val(editData[0].product_name);
                        $('#pBrand').val(editData[0].brand);
                        $('#pType').val(editData[0].type);
                        $('#pColor').val(editData[0].color);
                        $('#pSize').val(editData[0].size);
                        $('#pPrice').val(editData[0].price);
                        $('#pQty').val(editData[0].qty);
                        $('#pPicture').val(editData[0].picture);
                        $('#productId').val(editData[0].product_id);
                        $('#productIdDel').val(editData[0].product_id);
                    }
                });
            });
        });
        $(document).ready(function() {
            $('#example').DataTable();
            $(document).on('click', '.del_data', function() {
                var product_id = $(this).attr("id");
                console.log(product_id);
                $.ajax({
                    url: "fetchData.php?method=listProduct",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        console.log(data);
                        var editData = data.filter(item => {
                            return item.product_id === product_id
                        })
                        // console.log(editData[0].firstname);
                        $('#productIdDel').val(editData[0].product_id);
                    }
                });
            });

        });
        </script>
</body>
</body>

</html>