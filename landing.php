<?php include 'header.php'; ?>


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

  <button class="ui button" name="submit" id="submit" type="submit">Submit</button>
</form>
</div>
