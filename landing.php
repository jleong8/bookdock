<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
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

<?php

    $sql = "SELECT * FROM `books` WHERE `wishlist` = 1";
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

<style>

    .ui.card {
        margin-left: -20px;
        transform:scale(0.8,0.8);
    }
    .card .image {
      height: 400px;
      max-width: 100%;
      max-height: 100%;
      overflow: hidden;
    }
    h1 {
        margin-left: 20px;
    }
    br {
        line-height: 1000%;
    }
</style>


<h1>Dashboard</h1>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />
<h1>Wishlist</h1>
<div class="ui four cards">
<?php
foreach($result as $row) {
?>
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
  </div>
<?
}
?>
</div>

<hr style="height:5px;border:none;color:#333;background-color:#333;" />
<h1>Sold books</h1>
<br>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />
<h1>Messages</h1>
<br>
<hr style="height:5px;border:none;color:#333;background-color:#333;" />
