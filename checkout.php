<?php include 'header.php'; ?>
<?php include('connect.php'); ?>
<?php
session_start();
?>

<style>
    .ui.card {
        margin-left: 20px;
    }
    .card .image {
      height: 400px;
      max-width: 100%;
      max-height: 100%;
      overflow: hidden;
    }
    .amazon.icon {
      float: right;
    }
    .delete-class {
      color: red;
    }
    input[type=submit] {
      float: right;
      margin-bottom: 2px;
      margin-right: 2px;
    }
</style>

<?php

    $sql = "SELECT * FROM `books` WHERE `sold` != 1 AND `buyer_id` = '".$_SESSION['uid']."' ";
    //echo $sql;
    $sel = $pdo->prepare($sql);
    $sel->execute();
    $result = $sel->fetchAll();

?>

<?

function get($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($curl);
  curl_close($curl);
  return $output;
}

?>
<div>
<input type="submit" id="checkout" value="Checkout">
</div>

<div class="ui four cards">
<?php
foreach($result as $row) {
?>
<form action="checkout.php?action=add&id=<? echo $row['book_id']?>" method="POST">

  <?php
  $keyword = $row['title'] . " " . "book cover";
  //echo $keyword;
  $url = "https://www.bing.com/images/search?q=".str_replace(" ", "+", $keyword)."&qs=n&form=QBIR&sp=-1&pq=".str_replace(" ", "+", $keyword)."&sc=8-34&sk=&cvid=0FB8E004AC034F21A51B1D59172B56A5";
  //$url = "https://www.bing.com/images/search?sp=".str_replace(" ", "+", $keyword)."&sk=&cvid=72403DB04166491AB1CE84BB0995918D&q=".str_replace(" ", "+", $keyword)."&qft=+filterui:imagesize-medium&FORM=IRFLTR";
  $output = get($url);
  preg_match_all('!<a class="thumb" target="_blank" href="(.*?)"!', $output, $url_matches);
  ?>

  <div class="ui card">
  <div class="image">
  <img src=<? echo $url_matches[1][1]; ?>>
  </div>
  <div class="content">
  <a class="header"><? echo $row['title']; ?></a>
  <div class="meta">
  <span class="date">Published: <? echo $row['year']; ?></span>
  </div>
  <div class="description">
  Author: <? echo $row['author']; ?>
  <p style= text-align:"center" font-size="3">Price: $<? echo $row['price']; ?></p>
  </div>
  </div>
  <div class="extra content">
  <a href="remove.php?id=<? echo $row['book_id']?>"><i class="minus circle icon delete-class"></i></a>
  <a href="http://www.amazon.com/s/?url=search-alias%3Daps&field-keywords=<? echo $row['title'] ?>&Go=Go"><i class="amazon icon"></i></a>

  </div>
  </div>

  </form>


<?
}
// echo "</div>";
?>
</div>
