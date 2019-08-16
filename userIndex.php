<!doctype html>
<html lang="en">
<?php include "./component/userHead.php"  ?>


<head>

    <style>
        html {
            box-sizing: border-box;
        }

        *,
        *:before,
        *:after {
            box-sizing: inherit;
        }

        .column {
            float: left;
            width: 33.3%;
            margin-bottom: 16px;
            padding: 0 8px;
        }

        @media screen and (max-width: 650px) {
            .column {
                width: 100%;
                display: block;
            }
        }

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .container {
            padding: 0 16px;
        }

        .container::after,
        .row::after {
            content: "";
            clear: both;
            display: table;
        }

        .title {
            color: grey;
        }

        .button {
            border: none;
            outline: 0;
            display: inline-block;
            padding: 8px;
            color: white;
            background-color: #CD853F;
            text-align: center;
            cursor: pointer;
            width: 100%;
        }

        .button:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <?php include "./component/userNav.php"  ?>
    <?php
    require_once "./database.php";
    $db = new database;
    $result = $db->listProduct();
    $i = 0;
    // echo "<pre>";
    // print_r($_SESSION);
    // 	ini_set('display_errors', 1);
    // 	error_reporting(~0);

    //    $serverName = "192.168.20.102";
    //    $userName = "root";
    //    $userPassword = "";
    //    $dbName = "db_php_workshop";

    //    $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

    //    $sql = "SELECT * FROM product";

    //    $query = mysqli_query($conn,$sql);

    ?>



    <!-- body --> <br>
    <h2>&nbsp;JEANS</h2>
    <p>&nbsp;เปลี่ยนชีวิตประจำวันของคุณให้ไม่จำเจ กับกางเกงยีนส์จากพี่หมี</p>
    <hr width=90% size=10 color=#DCDCDC>
    <div class="container">

        <!-- Button to Open the Modal -->
        <form action="userSelectProduct.php" method="POST">
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                Order Now
            </button>

            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">.:: Order ::.</h4>
                            <button type="button" class="close" data-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="container">
                                <div class="row table-responsive">
                                    <form class="">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Color</th>
                                                    <th>Size</th>
                                                    <th class="text-center">qty</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($result as $key => $value) :
                                                    if (!empty($_SESSION['selectProduct'][$value['product_id']])) : ?>
                                                <tr>
                                                    <td><?= ++$i ?></td>
                                                    <td><?= $value['product_name'] ?></td>
                                                    <td><?= $value['color'] ?></td>
                                                    <td><?= $value['size'] ?></td>
                                                    <td class="text-center"><input required class="form-control text-right" type="number" name="qty[]" value="<?= $_SESSION['selectProduct'][$value['product_id']] ?>"></td>
                                                    <td class="text-center"><a><i class="fa fa-trash text-danger" style="font-size: 1.5em;" aria-hidden="true"></i></td>

                                                    <input type="hidden" value="<?= $value['product_id'] ?>" name="productId[]">
                                                </tr>
                                                <?php endif;
                                                endforeach; ?>
                                            </tbody>
                                        </table>
                                    </form>

                                    <!-- <form name="addproduct" action="add_product_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                        <div class="form-group">
                                            <div class="col-sm-9">
                                                <h4> Cash on delivery only..</h4>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <p> Color</p>
                                                    <input type="text" name="p_name" class="form-control" required placeholder="Color" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <p> Qty.</p>
                                                    <input type="text" name="p_name" class="form-control" required placeholder="Qty." />
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-sm-8">
                                                    <p> Size</p>
                                                    <select name="type_id" class="form-control" required>
                                                        <option value="type_id">S</option>
                                                        <option value="type_id">M</option>
                                                        <option value="type_id">L</option>
                                                        <option value="type_id">XL</option>
                                                        <option value="type_id">XXL</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-9">
                                                    <h5> Shoping cart total : </h5>
                                                    <?php ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <p> Address </p>
                                                    <textarea name="p_detail" rows="5" cols="60"></textarea>
                                                </div>
                                            </div>
                                    </form> -->

                                </div>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success" value="submit" name="btnadd"> Submit </button>
                            <!-- <input name="print" type="submit" id="print" value="Print" onClick="window.print()"/> -->
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

    </div>
    <br>
    <br>
    <div class="row">

        <?php
        // echo "<pre>";
        // print_r($_SESSION['selectProduct']);
        // exit;
        ?>

        <?php foreach ($result as $key => $value) : ?>
        <div class="column">
            <div class="card <?php if (!empty($_SESSION['selectProduct'][$value['product_id']])) echo "select-order"; ?>">
                <img src="./img/<?= $value['picture'] ?>" alt="<?= $value['product_name'] ?>" style="width:100%">
                <div class="container">
                    <h2><?= $value['product_name'] ?></h2>
                    <p class="title"><?= number_format($value['price'], 2) ?></p>
                    <p><?= $value['description'] ?> </p>
                    <p><a href="userSelectProduct.php?productId=<?= $value['product_id'] ?>"><button class="button"><?php if (!empty($_SESSION['selectProduct'][$value['product_id']])) echo "Selected";
                                                                                                                        else echo "Select" ?></button></a></p>
                </div>
            </div>
        </div>
        <?php endforeach;  ?>

    </div>

    <hr width=90% size=10 color=#DCDCDC><br>
    <!-- body -->
    <style>
        .select-order {
            border-radius: 7px 7px 7px 7px;
            -moz-border-radius: 7px 7px 7px 7px;
            -webkit-border-radius: 7px 7px 7px 7px;
            border: 4px outset #ff8400;
        }
    </style>

</body>

</html>