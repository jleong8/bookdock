<?php include 'header.php'; ?>
<?php include('connect.php'); ?>

<style>
    .ui.card {
        margin-left: 20px;
    }
</style>

<?

    $sql = "SELECT * FROM `books`";
    $sel = $pdo->prepare($sql);
    $sel->execute();
    $result = $sel->fetchAll();

?>

<?

$keyword = $row['title'];
$url = "https://www.bing.com/images/search?q=".str_replace(" ", "+", $keyword)."&qs=n&form=QBIR&sp=-1&pq=".str_replace(" ", "+", $keyword)."&sc=8-34&sk=&cvid=0FB8E004AC034F21A51B1D59172B56A5";
$output = get($url);

function get($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($curl);
  curl_close($curl);
  return $output;
}
// echo "<div class=\"ui four cards\">";
// foreach($result as $row) {
// echo "<div class=\"card\">";
// echo "<div class=\"image\">";
// echo "<img src=\"https://vignette.wikia.nocookie.net/harrypotter/images/2/2c/Goblet_of_Fire_Film_Poster.jpg/revision/latest?cb=20140817011104\">";
// echo  "</div>";
// echo "<div class=\"content\">";
// echo "<a class=\"header\">".$row['title']."</a>";
// echo "<div class=\"meta\">";
// echo "<span class=\"date\">Published: ".$row['year']."</span>";
// echo "</div>";
// echo "<div class=\"description\">";
// echo "Author:   ";
// echo $row['author'];
// echo "</div>";
// echo "</div>";
// echo "<div class=\"extra content\">";
// echo  "<a>";
// echo "<i class=\"amazon icon\"></i>";
// echo "<a href=\"http://www.amazon.com/s/?url=search-alias%3Daps&field-keywords=".$row['title']."&Go=Go\">Amazon</a>";
// echo "</a>";
// echo "</div>";
// echo "</div>";
// }
// echo "</div>";
?>
