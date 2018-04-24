<?php include 'header.php'; ?>
<?php include('connect.php'); ?>

<style>
    .ui.card {
        margin-left: 20px;
    }
    .card .image {
      height: 500px;
      max-width: 100%;
      max-height: 100%;
      overflow: hidden;
    }
    .amazon.icon {
      float: right;
    }
</style>

<?

// session_start();
//
// if(isset($_POST["add_to_cart"])) {
//     if(isset($_SESSION["shopping_cart"])) {
//         $item_array_id = array_column($_SESSION["shopping_cart"], "book_id");
//         if(!in_array($_GET["book_id"], $item_array_id)) {
//             $count = count($_SESSION["shopping_cart"]);
//             $item_array = array(
//                 'book_id' => $_GET["book_id"],
//                 'item_title' => $_POST["hidden_title"],
//                 'item_price' => $_POST["hidden_price"]
//             );
//             $_SESSION["shopping_cart"][$count] = $item_array;
//
//         }
//     }
//     else {
//         $item_array = array (
//             'book_id' => $_GET["book_id"],
//             'item_title' => $_POST["hidden_title"],
//             'item_price' => $_POST["hidden_price"]
//             );
//
//         $_SESSION["shopping_cart"][0] = $item_array;
//     }
// }
?>
<?

    $sql = "SELECT * FROM `books`";
    $sel = $pdo->prepare($sql);
    $sel->execute();
    $result = $sel->fetchAll();

?>

<?



// echo $output;

function get($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($curl);
  curl_close($curl);
  return $output;
}




echo "<div class=\"ui four cards\">";
foreach($result as $row) {
?>
<form action="buy.php?action=add&id=".$row['book_id']."" method="POST">;

  <?php
  $keyword = $row['title'] . " " . "book cover";
  //echo $keyword;
  $url = "https://www.bing.com/images/search?q=".str_replace(" ", "+", $keyword)."&qs=n&form=QBIR&sp=-1&pq=".str_replace(" ", "+", $keyword)."&sc=8-34&sk=&cvid=0FB8E004AC034F21A51B1D59172B56A5";
  //$url = "https://www.bing.com/images/search?sp=".str_replace(" ", "+", $keyword)."&sk=&cvid=72403DB04166491AB1CE84BB0995918D&q=".str_replace(" ", "+", $keyword)."&qft=+filterui:imagesize-medium&FORM=IRFLTR";
  $output = get($url);
  preg_match_all('!<a class="thumb" target="_blank" href="(.*?)"!', $output, $url_matches);
  ?>

  <div class="card">
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
  <p style= text-align:"center" font-size="3">$<? echo $row['price']; ?></p>
  </div>
  </div>
  <div class="extra content">
  <input type="hidden" name="hidden_title" value=<? echo $row['title']; ?>>
  <input type="hidden" name="hidden_price" value=<? echo $row['price'];?>>
  <input type="submit" name="add_to_cart" value="Add to Cart">
  <a href="http://www.amazon.com/s/?url=search-alias%3Daps&field-keywords=<? echo $row['title'] ?>&Go=Go"><i class="amazon icon"></i></a>

  </div>
  </div>

  </form>
  }

<?
}
echo "</div>";
?>
