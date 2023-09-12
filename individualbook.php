<?php 
require_once('conn.php');
$conn = mysqli_connect($host, $user, $pass, $db);
$titlequery = "select title from books where id='".$_GET['id']."'";
$titleres = mysqli_query($conn, $titlequery);
$row = mysqli_fetch_assoc($titleres);
$booktitle = $row['title']; // allows title to change with the current book's title.
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8"/>
<link rel="icon" href="favicn.ico" type="image/x-icon"/>
<link rel="shortcut icon" href="favicn.ico" type="image/x-icon"/>
<title>My Library - <?php echo "$booktitle"?></title>
<link rel="stylesheet" href="css/light.css" title="Day Mode"/>
<link rel="alternate stylesheet" href="css/dark.css" title="Night Mode"/>
</head>
<body>
<?php include("header.txt") ?>
<main>
<aside class="left">
<header><h1>Similar Books</h1></header>
<section>
<?php include("similar.php")?>
</section>
</aside>
<section id="main">
<?php include("search.txt") ?>
<header class="squared"><h1>Book Details</h1></header>
<section id="details">
<?php
$conn = mysqli_connect($host, $user, $pass, $db);
$query = "select * from books where id='".$_GET['id']."'";
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
    $sub_category = $row['sub_category'];
    $lentto = $row['lentto'];
    $readon = $row['readon'];
    echo '<img class="itemimg" src="'.$img.'">';
    echo '<h1 class="itemtitle">'.$title.'</h1>';
    echo '<p class="itemauthor">'.$author.'</p>';
    echo '<p class="itempub">'.$publisher.'</p>';
    echo '<p class="itempubdate">'.$pubdate.'</p>';
    echo '<p class="itemisbn">ISBN: '.$ISBN.'</p>';
    echo '<p class="itemsummary">Summary: '.$summary.'</p>';
    echo '<p class="itemlocation">Location: '.$shelf.'</p>';
    echo '<p class="itempreciselocation">Sorted with: '.$shelf.'</p>';
    echo '<p class="itemsummary">Borrowed by: '.$lentto.'</p>';
    echo '<p class="itemreadon">Read on: '.$readon.'</p>';
}
?>
</section>
<footer>
<p><a href="javascript:window.print()">Print this page</a> |
</p>
</footer>
</section>
<aside class="right">
<header><h1>Add to read list</h1></header>
<section class="squared">
	<form action="individualbook.php?id=<?php echo $_GET['id']; ?>" method='post'>
	<button name='update' id='update' class="button">I've read this book</button>
	</form>
</section>
	<?php if (array_key_exists('update', $_POST)) {
	$query1 = "update books set `readon` = current_date() where id=".$_GET['id'].";";
	$result1 = mysqli_query($conn, $query1);
	} //allows you to track when you've read a book in your library by marking it in the database.
?>
<?php include("borrowers.php") ?>
<?php if (array_key_exists('lendto', $_POST)) {
        $query1 = "update books set `lentto` ='".$_POST['borrower']."' where id='".$_GET['id']."';";
        $result1 = mysqli_query($conn, $query1);
        } //allows you to track who has borrowed your books through the database.
?>
</aside>
</main>
<?php include("footer.txt") ?>
</body>
