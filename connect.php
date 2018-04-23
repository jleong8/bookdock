	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
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