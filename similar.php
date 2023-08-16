<?php 
require_once('conn.php');
$conn = mysqli_connect($host, $user, $pass, $db);
$shelfquery = "select shelf from books where id='".$_GET['id']."'";
$shelfres = mysqli_query($conn, $shelfquery);
$row = mysqli_fetch_assoc($shelfres);
$bookshelf = $row['shelf'];
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "select * from books where shelf='".$bookshelf."' and id !='".$_GET['id']."' order by rand() limit 2";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result)){
    $title = $row['title'];
    $author = $row['author'];
    $id = $row['id'];
    $img = $row['img'];
    $publisher =$row['publisher'];
    $pubdate = $row['pubdate'];
    $ISBN = $row['ISBN'];
    $summary = $row['summary'];
    $shelf = $row['shelf'];
    $lentto = $row['lentto'];
    $readon = $row['readon'];
    echo '<div class="item">';
    echo '<a href="individualbook.php?id='.$id.'">';
    echo '<img class="itemimg" src="'.$img.'">';
    echo '<h1 class="itemtitle">'.$title.'</h1>';
    echo '<p class="itemauthor">'.$author.'</p>';
    echo '<p class="itempub">'.$publisher.'</p>';
    echo '<p class="itempubdate">'.$pubdate.'</p>';
    echo '<p class="itemisbn">ISBN: '.$ISBN.'</p>';
    echo '<p class="itemsummary">'.$summary.'</p>';
    echo '<p class="itemlocation">'.$shelf.'</p>';
    echo '</a>';
    echo '</div>';
}
?>

