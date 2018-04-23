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



// echo $output;

function get($url) {
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $output = curl_exec($curl);
  curl_close($curl);
  return $output;
}

preg_match_all('!<a class="thumb" target="_blank" href="(.*?)"!', $output, $url_matches);
//$print = print_r($url_matches[1][0]);

echo "<div class=\"ui four cards\">";
foreach($result as $row) {

$keyword = $row['title'];
$url = "https://www.bing.com/images/search?q=".str_replace(" ", "+", $keyword)."&qs=n&form=QBIR&sp=-1&pq=".str_replace(" ", "+", $keyword)."&sc=8-34&sk=&cvid=0FB8E004AC034F21A51B1D59172B56A5";
$output = get($url);

echo "<div class=\"card\">";
echo "<div class=\"image\">";
echo "<img src=\"print_r($url_matches[1][0])\">";
echo  "</div>";
echo "<div class=\"content\">";
echo "<a class=\"header\">".$row['title']."</a>";
echo "<div class=\"meta\">";
echo "<span class=\"date\">Published: ".$row['year']."</span>";
echo "</div>";
echo "<div class=\"description\">";
echo "Author:   ";
echo $row['author'];
echo "</div>";
echo "</div>";
echo "<div class=\"extra content\">";
echo  "<a>";
echo "<i class=\"amazon icon\"></i>";
echo "<a href=\"http://www.amazon.com/s/?url=search-alias%3Daps&field-keywords=".$row['title']."&Go=Go\">Amazon</a>";
echo "</a>";
echo "</div>";
echo "</div>";
}
echo "</div>";
?>
