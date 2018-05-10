<?php include 'header.php'; ?>
<?php

    $servername = "us-cdbr-iron-east-05.cleardb.net";
    $username = "b8f0d04ab35a31";
    $password = "f80e0f51";
    $dbname = "heroku_813ab07d7ae2164";

     try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    }
    catch(PDOException $e)
        {
        echo $e->getMessage();
        }

?>

<style>
    h1 {
        margin-left: 20px;
    }
    br {
        line-height: 1000%;
    }
</style>

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
