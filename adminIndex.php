<!doctype html>
<html lang="en">
<?php 
    include "./component/adminHead.php";
    require_once "./database.php";
    $db = new database;

    if (!empty($_SESSION['userId'])) {
        if ($_SESSION['type'] === "user") header("Location: userIndex.php");
        // else header("Location: userIndex.php");
        // exit;
    } else {
        header('Location: index.php');
        // exit;
    }

?>

<body>
    <div class="d-flex" id="wrapper">
        <?php include "./component/adminSidebar.php"  ?>
        <div id="page-content-wrapper">
            <?php include "./component/adminNav.php"  ?>

            <div class="container-fluid">
                <h1 class="mt-4">หน้าแรกหลังจาก login เดี๋ยวหาอะไรมาใส่</h1>
            </div>
            
        </div>
    </div>
</body>

</html>