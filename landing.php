<?php include 'header.php'; ?>
<?php include('connect.php'); ?>


<style>
    h1 {
        margin-left: 20px;
    }
    br {
        line-height: 1000%;
    }
</style>


<?php

    $sql = "SELECT * FROM `books` WHERE `sold` = 0";
    $sel = $pdo->prepare($sql);
    $sel->execute();
    $result = $sel->fetchAll();

?>

<div class="ui column centered grid">
<h1>Dashboard</h1>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />
<h1>Wishlist</h1>
<br>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />
<h1>Sold books</h1>
<br>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />
<h1>Messages</h1>
<br>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />

</div>
