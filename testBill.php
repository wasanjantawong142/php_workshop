<?php
error_reporting(error_reporting() & ~E_NOTICE);
session_start();
?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>

    <?php
    ini_set('display_errors', 1);
    error_reporting(~0);

    $serverName = "192.168.20.102";
    $userName = "root";
    $userPassword = "";
    $dbName = "db_php_workshop";
    $Bill_id = intval($_POST["Bill_id"]);
    $conn = mysqli_connect($serverName, $userName, $userPassword, $dbName);

    $sql = "SELECT * FROM `receipt`,`order`,`user`,`order_detail`,`product` WHERE receipt.order_id= order.order_id AND order.user_id = user.user_id AND order.order_id = order_detail.order_id AND order_detail.product_id = product.product_id AND receipt.receipt_id ='$Bill_id'";


    $query = mysqli_query($conn, $sql);
    // echo $query;
    ?>




    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">

                <br>
                <table width="100" border="1" align="center" class="table">
                    <tr>
                        <td width="300" colspan="5" align="center">
                            <h2>ใบเสร็จรับเงิน</h2>


                            <div align="right">เลขที่ใบเสร็จ<?php echo $Bill_id; ?></div>

                            <h4 align="left">ร้าน Jean By พี่หมี</h4>
                            <h4 align="left">263/13 99 99 99 99</h4>
                            <h4 align="left">Tel.096-8675648</h4>
                        </td>
                        </td>
                    </tr>
                    <tr class="success">
                        <td align="center">ลำดับ</td>
                        <td align="center">รายการ</td>
                        <td align="center">จำนวน</td>
                        <td align="center">ราคาต่อหน่วย</td>
                        <td align="center">ยอดรวม</td>
                    </tr>
                    <?php
                    $i = 1;
                    while ($result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                        // print_r($result) ;
                        ?>
                    <tr>
                        <td align="center"><?php echo $i; ?></td>
                        <td align="center"><?php echo $result['product_name'] . " by " . $result['brand']; ?></td>
                        <td align="center"><?php echo $result['qty'] ?></td>
                        <td align="center"><?php echo $result['price'] ?></td>
                        <td align="center"><?php echo $result['total'] ?></td>
                    </tr>
                    <?php
                        $i++;
                    }
                    ?>
                </table>

                <div class="row text-center">
                    <input class="btn btn-success" type="button" name="button" id="button" value="Print" onclick="print();">
                </div>
            </div>
        </div>
    </div>
    </div>


</body>

</html>