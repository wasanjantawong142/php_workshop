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
	ini_set('display_errors', 1);
	error_reporting(~0);

   $serverName = "192.168.20.102";
   $userName = "root";
   $userPassword = "";
   $dbName = "db_php_workshop";

   $conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);

   $sql = "SELECT * FROM product";

   $query = mysqli_query($conn,$sql);

?>



    <!-- body --> <br>
    <h2>&nbsp;JEANS</h2>
    <p>&nbsp;เปลี่ยนชีวิตประจำวันของคุณให้ไม่จำเจ กับกางเกงยีนส์จากพี่หมี</p>
    <hr width=90% size=10 color=#DCDCDC>
    <div class="container">

        <!-- Button to Open the Modal -->
        <form action="">
        <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
            Order Now
        </button>

        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">.:: Order ::.</h4>
                        <button type="button" class="close" data-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <form name="addproduct" action="add_product_db.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
                                                    <?php foreach ($result as $results) { ?>
                                                    <option value="<?php echo $results["type_id"]; ?>">
                                                        <?php echo $results["type_name"]; ?>
                                                    </option>
                                                    <?php } ?>
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
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="btnadd" > Submit </button>
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
        <div class="column">
            <div class="card">
                <img src="" alt="Jane" style="width:100%">
                <div class="container">
                    <h2>Jane Doe</h2>
                    <p class="title">CEO & Founder</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
                <div class="container">
                    <h2>Mike Ross</h2>
                    <p class="title">Art Director</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/w3images/team3.jpg" alt="John" style="width:100%">
                <div class="container">
                    <h2>John Doe</h2>
                    <p class="title">Designer</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <div class="card">
                <img src="" alt="Jane" style="width:100%">
                <div class="container">
                    <h2>Jane Doe</h2>
                    <p class="title">CEO & Founder</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
                <div class="container">
                    <h2>Mike Ross</h2>
                    <p class="title">Art Director</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/w3images/team3.jpg" alt="John" style="width:100%">
                <div class="container">
                    <h2>John Doe</h2>
                    <p class="title">Designer</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <div class="card">
                <img src="" alt="Jane" style="width:100%">
                <div class="container">
                    <h2>Jane Doe</h2>
                    <p class="title">CEO & Founder</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>

        <div class="column">
            <div class="card">
                <img src="/w3images/team2.jpg" alt="Mike" style="width:100%">
                <div class="container">
                    <h2>Mike Ross</h2>
                    <p class="title">Art Director</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>
        <div class="column">
            <div class="card">
                <img src="/w3images/team3.jpg" alt="John" style="width:100%">
                <div class="container">
                    <h2>John Doe</h2>
                    <p class="title">Designer</p>
                    <p>Detail</p>                    
                    <p><button class="button">Select</button></p>
                </div>
            </div>
        </div>
    </div>
    <hr width=90% size=10 color=#DCDCDC><br>
    <!-- body -->

</body>

</html>