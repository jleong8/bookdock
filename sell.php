<?php include 'header.php'; ?>
<?php include('connect.php'); ?>

<style>
    .ui.column.centered.grid {
        text-align: left;
        margin-top: 50px;
    }


</style>

<?php

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $uniq = substr(uniqid(),0,6);

    $sql = "INSERT INTO `books` (`title`, `author`, `year`, `price`, `book_id`) VALUES ('".$_POST['title']."','".$_POST['author']."','".$_POST['year']."', '".$_POST['price']."', '".$uniq."')";

    $sel = $pdo->prepare($sql);
    $sel->execute();

}

?>

<div class="ui column centered grid">
<form class="ui form" action="sell.php" method="POST">
  <div class="field">
    <label>Title</label>
    <input type="text" name="title" placeholder="Title">
  </div>
  <div class="field">
    <label>Author</label>
    <input type="text" name="author" placeholder="Author">
  </div>
    <div class="field">
    <label>Year</label>
    <input type="text" name="year" placeholder="Year">
  </div>
  <div class="field">
  <label>Price</label>
  <input type="text" name="price" placeholder="$">
</div>


  <button class="ui button" name="submit" id="submit" type="submit">Submit</button>
  </div>
</form>
</div>
