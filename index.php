<?php include('connect.php'); ?>
<html>

<head>

  <title>Bookdock</title>
  <link rel="stylesheet" href="cloudStyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.css">
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>

  <style type="text/css">
    .hidden.menu {
      display: none;
    }

    .masthead.segment {
      min-height: 700px;
      padding: 1em 0em;
    }

    .masthead .logo.item img {
      margin-right: 1em;
    }

  

    .masthead h1.ui.header {
      margin-top: 3em;
      margin-bottom: 0em;
      font-size: 4em;
      font-weight: normal;
    }

    .masthead h2 {
      font-size: 1.7em;
      font-weight: normal;
    }

    .ui.vertical.stripe {
      padding: 8em 0em;
    }

    .ui.vertical.stripe h3 {
      font-size: 2em;
    }

    .ui.vertical.stripe .button+h3,
    .ui.vertical.stripe p+h3 {
      margin-top: 3em;
    }

    .ui.vertical.stripe .floated.image {
      clear: both;
    }

    .ui.vertical.stripe p {
      font-size: 1.33em;
    }

    .ui.vertical.stripe .horizontal.divider {
      margin: 3em 0em;
    }

    .quote.stripe.segment {
      padding: 0em;
    }

    .quote.stripe.segment .grid .column {
      padding-top: 5em;
      padding-bottom: 5em;
    }

    .footer.segment {
      padding: 5em 0em;
    }

    .secondary.pointing.menu .toc.item {
      display: none;
    }

    @media only screen and (max-width: 700px) {
      .ui.fixed.menu {
        display: none !important;
      }
      .secondary.pointing.menu .item,
      .secondary.pointing.menu .menu {
        display: none;
      }
      .secondary.pointing.menu .toc.item {
        display: block;
      }
      .masthead.segment {
        min-height: 350px;
      }
      .masthead h1.ui.header {
        font-size: 2em;
        margin-top: 1.5em;
      }
      .masthead h2 {
        margin-top: 0.5em;
        font-size: 1.5em;
      }
    }
    
    #center {
        background-image: url("images/landing.jpg");
        background-size: cover;
    }
    
    #header {
        background-color: transparent;
    }
    
    #header2 {
        background-color: transparent;
        border-color: transparent;
    }
  </style>

  <script>
    $(document)
      .ready(function() {
        // fix menu when passed
        $('.masthead')
          .visibility({
            once: false,
            onBottomPassed: function() {
              $('.fixed.menu').transition('fade in');
            },
            onBottomPassedReverse: function() {
              $('.fixed.menu').transition('fade out');
            }
          });
        // create sidebar and attach to menu open
        $('.ui.sidebar')
          .sidebar('attach events', '.toc.item');
      });

  </script>

</head>

<body>



 
  <!-- Page Contents -->
  <div class="pusher">
    <div class="ui inverted vertical masthead center aligned segment" id="center">

 
    <div class="ui large secondary inverted pointing menu" id="header2">
      <a class="toc item">
      <i class="sidebar icon"></i>
    </a>

     
      <div class="right item">
    <?php 
    
        if(!array_key_exists('username', $_SESSION)) echo "<div class='item'><a href='login.php' class='ui button'>Login</a></div><div class='item'><a href='sign-up.php' class='ui primary button'>Sign Up</a></div>"; else echo "<div class='item'><a href='logout.php' class='ui button'>Logout</a></div>";
        
    ?>
      </div>
    </div>
  
      <div class="ui text container" style="animation-name: fadeInDown; animation-duration: 3s;">
        <h1 class="ui inverted header" style="color: black">
        Welcome to Book Dock!
      </h1>
        <h3></h3><br>
<div class="ui fluid category search">
      <div class="ui icon input">
        <input class="prompt" type="text" placeholder="Search books...">
        <i class="search icon"></i>
      </div>
      <div class="results"></div>
    </div>
      </div>

    </div>






    <div class="ui inverted vertical footer segment">
      <div class="ui container">
        <div class="ui stackable inverted divided equal height stackable grid">
          <div class="three wide column">
            <h4 class="ui inverted header">About</h4>
            <div class="ui inverted link list">
              <a href="developers.php" class="item">Developers</a>
            </div>
          </div>
       
          <div class="seven wide column">
          </div>
        </div>
      </div>
    </div>

  </div>
   

  
</body>

</html>
