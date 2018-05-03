<?php include 'header.php'; ?>
<?php include('connect.php'); ?>
<?php
session_start();
?>
<?php

$book_id = $_GET['id'];

$sql = "UPDATE `books` SET `buyer_id` = '' WHERE `book_id` = '".$book_id."'";
//echo $sql;
$sel = $pdo->prepare($sql);
$sel->execute();
echo "<script type='text/javascript'>window.location='checkout.php'; </script>";
?>
