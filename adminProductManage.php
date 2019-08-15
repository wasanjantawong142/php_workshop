<!doctype html>
<html lang="en">
<?php 
include "./component/adminHead.php";
require_once("./database.php");
$db = new database;
$infor_product = $db->listProduct();
// print_r($infor_product);
?>

<body>
    <div class="d-flex" id="wrapper">
        <?php include "./component/adminSidebar.php" ?>
        <div id="page-content-wrapper">
            <?php include "./component/adminNav.php" ?>

            <!-- content -->
            <!-- <div class="container-fluid">
                <h1 class="mt-4">Product Management</h1>
                <td style="margin-right:0px;"><button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target="#CreateProduct">เพิ่มสินค้า</button>
                </td><br><br>
                <table class="table" style="align:left">
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
                            echo "<td><button type='button' class='btn btn-warning' data-toggle='modal' data-target='#EditModal'>แก้ไข</button></td>";
                            echo "<td><button type='button' class='btn btn-danger'>ลบ</button></td>";
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
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md- 6">
                                            <label for="inputEmail4">ชื่อสินค้า</label>
                                            <input type="text" class="form-control" name="pName" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">แบรนด์</label>
                                            <input type="text" class="form-control" name="pBrand"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">รุ่น</label>
                                            <input type="text" class="form-control" name="pType " placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">ไซต์</label>
                                            <select id="pSize" class="form-control">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">สี</label>
                                            <input type="text" class="form-control" name="pColor" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ราคา</label>
                                            <input type="text " class="form-control" name="pPrice" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">จำนวน</label>
                                            <input type="text" class="form-control" name="pQty" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">เลือกรูปภาพใหม่</label>
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
                                <form>
                                    <div class="form-row">
                                        <div class="form-group col-md- 6">
                                            <label for="inputEmail4">ชื่อสินค้า</label>
                                            <input type="text" class="form-control" name="pName" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">แบรนด์</label>
                                            <input type="text" class="form-control" name="pBrand"
                                                placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">รุ่น</label>
                                            <input type="text" class="form-control" name="pType " placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputState">ไซต์</label>
                                            <select id="pSize" class="form-control">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                                <option value="XXL">XXL</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">สี</label>
                                            <input type="text" class="form-control" name="pColor" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">ราคา</label>
                                            <input type="text " class="form-control" name="pPrice" placeholder="Email">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="inputPassword4">จำนวน</label>
                                            <input type="text" class="form-control" name="pQty" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlFile1">เลือกรูปภาพใหม่</label>
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

                <!-- content -->

        </div>
    </div>
</body>

</html>