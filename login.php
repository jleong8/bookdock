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

if(isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM login WHERE username = '".$username."' AND password = '".$password."' LIMIT 1";
    
    $sel = $pdo->prepare($sql);
    $sel->execute();
    //$result = $sel->fetchAll();
    while($res = $sel->fetch(PDO::FETCH_ASSOC)){
        $id = $res['id'];
        echo "<script type='text/javascript'>  window.location='landing.php?id=".$id."'; </script>";
    }
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
  <h1 class="text-center" style="margin-top: 180px;">BookDock User Login</h1>
</div>

<div id="body" class="container center">
  <div class="thumbnail text-center">
    <form action="login.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Username</label>
        <input type="email" id="username" name="username" class="form-control" placeholder="Enter email">
      </div>
      <div class="form-group">
       <label for="exampleInputPassword1">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password">
      </div>
      <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Login</button>
      <!--This button below will be temporary>-->
      <!--<button type="button" onclick="window.location.href='MainCategoryTest.html'" class="btn btn-primary">Login</button>-->
    </form>
  </div>
</div>

</body>
</html>