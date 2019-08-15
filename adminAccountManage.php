<?php
require_once "./database.php";
$db = new database;
$dataAccount = $db->listUser();
// echo "<pre>";
// print_r($dataAccount);
?>

<!doctype html>
<html lang="en">
<?php include "./component/adminHead.php"  ?>

<body>
    <div class="d-flex" id="wrapper">
        <?php include "./component/adminSidebar.php"  ?>
        <div id="page-content-wrapper">
            <?php include "./component/adminNav.php"  ?>

            <body>
                <div class="container">

                    <!-- Static navbar -->
                    <div class="navbar navbar-default" role="navigation">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <img width="45" height="50" src="https://scontent.fbkk4-2.fna.fbcdn.net/v/t1.15752-9/67887652_360119611567842_6957564629715255296_n.png?_nc_cat=104&_nc_oc=AQkZxZoMdmnSq1X0dw5ese0GrY5kCMoQs78eDd7qkVS10HhZyp0p0c8fMsPF73RQdR4&_nc_ht=scontent.fbkk4-2.fna&oh=3ae145d0a3f5aea830dbc4413a3bb2b9&oe=5DD6B4ED">
                                <!-- <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button> -->
                                <a class="">Jean By..พี่หมี</a>
                            </div>
                            <div class="navbar-collapse collapse">

                            </div>
                            <!--/.nav-collapse -->

                            <!-- The Modal -->
                            <div class="modal" id="myModal">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">.:: Edit Account ::.</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <div class="container">
                                                <div class="row">
                                                    <form name="addproduct" action="add_product_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                        <div class="form-group">
                                                            <div class="col-sm-9">
                                                                <p> Name</p>
                                                                <input type="text" name="p_name" class="form-control" required placeholder="Name" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-9">
                                                                <p> Lastname</p>
                                                                <input type="text" name="p_name" class="form-control" required placeholder="Lastname" />
                                                            </div>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <div class="col-sm-8">
                                                                <p> Type </p>
                                                                <select name="type_id" class="form-control" required>
                                                                    <option value="type_id">Long leg</option>
                                                                    <option value="type_id">Short leg</option>
                                                                    <?php foreach ($result as $results) { ?>
                                                                    <option value="<?php echo $results["type_id"]; ?>">
                                                                        <?php echo $results["type_name"]; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-8">
                                                                <p> Size </p>
                                                                <select name="type_id" class="form-control" required>
                                                                    <option value="type_id">S</option>
                                                                    <option value="type_id">M</option>
                                                                    <option value="type_id">L</option>
                                                                    <option value="type_id">XL</option>
                                                                    <option value="type_id">XXL</option>
                                                                    <?php foreach ($result as $results) { ?>
                                                                    <option value="<?php echo $results["type_id"]; ?>">
                                                                        <?php echo $results["type_name"]; ?>
                                                                    </option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>

                                                        </div> -->

                                                        <div class="form-group">
                                                            <div class="col-sm-9">
                                                                <p> Address</p>
                                                                <input type="text" name="p_name" class="form-control" required placeholder="Address" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-9">
                                                                <p> Tel.</p>
                                                                <input type="text" name="p_name" class="form-control" required placeholder="Tel." />
                                                            </div>
                                                        </div>
                                                        <!-- <div class="form-group">
                                                            <div class="col-sm-12">
                                                                <p> Model </p>
                                                                <textarea name="p_detail" rows="5" cols="60"></textarea>
                                                            </div>
                                                        </div> -->
                                                        <!-- <div class="form-group">

                                                            <div class="col-sm-12">
                                                                <p> Picture </p>
                                                                <input type="file" name="p_img" id="p_img" class="form-control" />
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-sm-12">


                                                            </div>
                                                        </div> -->
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-success" name="btnadd"> Save </button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/.container-fluid -->
                    </div>

                    <!-- Main component for a primary marketing message or call to action -->

                    <h3>Account Management</h3>

                    <table id="" class="table table-striped">
                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Lastname</th>
                                <th>Address</th>
                                <th>Tel.</th>

                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><img src="images/<?php ?>" border="0"></td>
                                <td><?php ?></td>
                                <td><?php ?></td>
                                <td><?php ?></td>
                                <td><?php ?></td>
                                <td><?php ?></td>


                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                        Edit
                                    </button>
                                    <a class="btn btn-primary " href="updatecart.php?itemId=<?php echo $meResult['id']; ?>" role="button">
                                        <span class="delete"></span>
                                        Delete</a>

                                </td>
                            </tr>
                            <?php

                            ?>
                        </tbody>
                    </table>

                </div>
                <script>
                    $(document).ready(function() {
                        $('#myTable').DataTable();
                    });
                </script>

            </body>

</html>