<?php include('connect.php'); ?>

<style>
    #back-button {
        margin-bottom: 10px;
    }
    .thumbnail.text-center {
        margin-top: 40px;
    }
</style>
<?php

if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];

    $sql = "INSERT INTO `login` (`username`, `password`, `name`) VALUES ('".$_POST['username']."','".$_POST['password']."','".$_POST['name']."')";

    $sel = $pdo->prepare($sql);
    $sel->execute();
    //$result = $sel->fetchAll();

    echo "<script type='text/javascript'>  window.location='index.php'; </script>";

}

?>
<!DOCTYPE html>
<html>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BookDock</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="stylesheets/login.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<body style="background-image: url(images/login.jpg);">


<div id="header" class="container-fluid" style="background-color: #F8F8FF !important;">
  <div class="container-fluid text-center">


  </div>
  <button id="back-button" onclick="window.location.href='index.php'" type="button" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-circle-arrow-left" aria-hidden="true"></span> BACK
  </button>
</div>

<div class="container">
  <h1 class="text-center" style="margin-top: 180px;">BookDock User Signup</h1>
</div>

<div class="ui column centered grid">
<form class="ui form" action="sign-up.php" method="POST">
  <div class="field">
    <label>Email</label>
    <input type="email" name="email" placeholder="email">
  </div>
  <div class="field">
    <label>Name</label>
    <input type="text" name="name" placeholder="name">
  </div>
    <div class="field">
    <label>Password</label>
    <input type="password" name="password" placeholder="password">
  </div>

  <button class="ui button" name="submit" id="submit" type="submit">Submit</button>
</form>
</div>

</body>
</html>
