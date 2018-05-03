<?php include 'header.php'; ?>
<?php include('connect.php'); ?>
<?php
session_start();
?>
<?php

$buyer_id = $_GET['id'];
$sql = "UPDATE `books` SET `book_id` = '""' WHERE `buyer_id` = '".$_SESSION['uid']."'";
//echo $sql;
$sel = $pdo->prepare($sql);
$sel->execute();
echo "<script type='text/javascript'>window.location='checkout.php'; </script>";
?>
