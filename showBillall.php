<!doctype html>
<html lang="en">
<?php include "./component/userHead.php"  ?>

<head>
    <style>
        table {
            
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
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

   $sql = "SELECT * FROM receipt";

   $query = mysqli_query($conn,$sql);

?>

    <h2>Receipt </h2>
    <hr width=90% size=10 color=#DCDCDC>

    <table>
        
        <tr>
        
            <th><div align="center">No. </div></th>
            <th><div align="center">Bill ID</div></th>
            <th><div align="center">Date</div></th>
           
        </tr>
       
        <?php
while($result=mysqli_fetch_array($query,MYSQLI_ASSOC))
{
?>
  <tr>
    <td><div align="center"><?php echo $result["receipt_id"];?></div></td>
    <td><div align="center"><?php echo $result["order_id"];?></div></td>
    <td><div align="center"><?php echo $result["created_at"];?></div></td>
  </tr>
<?php
}
?>
    </table>
</body>

</html>